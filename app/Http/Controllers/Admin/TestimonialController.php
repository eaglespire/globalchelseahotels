<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Requests\TestimonialRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('testimonial.index');
    }

    public function create()
    {
        return view('testimonial.create');
    }

    public function edit($id)
    {
       $testimonial = Testimonial::find($id);
       return view('testimonial.edit', compact('testimonial'));
    }

    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        return view('testimonial.show', compact('testimonial'));
    }

    public function store(TestimonialRequest $request)
    {
        $attributes = $request->all();

        $profile_pic = $request->profile_pic ? $request->profile_pic->store('reviews/profile_pic') : null;
        
        $attributes['profile_pic'] = $profile_pic;
        
        Testimonial::create($attributes);

        Alert::success('Created Successfully!');

        return redirect()->route('admin.testimonial');
    }

    public function update(TestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::find($id);

        $attributes = $request->all();

        $profile_pic = $request->profile_pic ? $request->profile_pic->store('reviews/profile_pic') : $testimonial->profile_pic;
        
        $attributes['profile_pic'] = $profile_pic;

        $testimonial->update($attributes);

        Alert::success('Updated Successfully!');

        return redirect()->route('admin.testimonial');
    }
}