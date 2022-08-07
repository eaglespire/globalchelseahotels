<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\AboutSection;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Room;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\TestimonialRequest;

class PageController extends Controller
{
    public function home()
    {
        $avaliableRooms = Room::avaliableRooms();
        $rooms = Room::latest()->take(4)->get();
        $posts = Post::latest()->take(3)->get();
        $about = AboutSection::first();
        $testimonials = Testimonial::approved()->latest()->get();
        $galleries = Gallery::latest()->get();

        return view('page.home', compact('rooms', 'posts', 'about', 'testimonials', 'galleries', 'avaliableRooms'));
    }

    public function about()
    {
        $avaliableRooms = Room::avaliableRooms();
        $rooms = Room::latest()->take(3)->get();
        $testimonials = Testimonial::approved()->latest()->get();
        $about = AboutSection::first();
        $galleries = Gallery::latest()->get();
        return view('page.about', compact('about', 'testimonials', 'galleries', 'avaliableRooms'));
    }

    /*
        Return all rooms
    */

    public function roomIndex()
    {
        $rooms = Room::latest()->paginate(6);
        return view('page.rooms.index', compact('rooms'));
    }

    /*
        Return a single room details
    */
    public function roomShow($id)
    {
        $room = Room::find($id);
        $rooms = Room::latest()->take(4)->get();
        $about = AboutSection::select('content')->first();
        return view('page.rooms.show', compact('room', 'rooms', 'about'));
    }

    /*
        Return all rooms
    */

    public function postIndex()
    {
        $posts = Post::latest()->paginate(6);

        return view('page.posts.index', compact('posts'));
    }

    /*
        Return a single room details
    */
    public function postShow($id)
    {
        $post = Post::find($id);
        $previous = $post->previous($id)->first();
        $next = $post->next($id)->first();
        $rooms = Room::select('id', 'image')->latest()->take(9)->get();
        $about = AboutSection::first()->select('content')->get();
        $latestPosts = Post::select('id', 'title', 'image', 'body')->latest()->take(4)->get();
        return view('page.posts.show', compact('post', 'previous', 'next', 'rooms', 'about', 'latestPosts'));
    }

    public function faq()
    {
        return view('page.faq');
    }

    public function services()
    {
        return view('page.service');
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('page.gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function contactStore(Request $request)
    {
        $attributes = $this->validate($request, [
           'name' => 'required|string',
           'email' => 'required|string',
            'subject' => 'required|string',
           'message' => 'required|string'
        ]);

        $contact = Contact::create($attributes);

        Mail::to('support@globalchelseahotel.com')
            ->send(new ContactUsMail($attributes));

        Alert::success('Sent', 'Message sent successfully!!!.');
        return redirect()->route('contact');

    }

    public function feedback()
    {
        $testimonials = Testimonial::approved()->latest()->get();
        return view('page.feedback.index', compact('testimonials'));
    }

    public function feedbackStore(TestimonialRequest $request)
    {
        $atrributes = $request->all();

        // dd($atrributes['name']);

         $profile_pic = $request->profile_pic ? $request->profile_pic->store('reviews/profile_pic') : null;

        $attributes['profile_pic'] = $profile_pic;

        Testimonial::create($atrributes);

        Alert::success('Thanks, Your Feedback has been recieved');

        return back();
    }
}
