<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Mail\Invoice;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{

    public function index()
    {
        return view('booking.index');
    }

    public function create()
    {
        $rooms = Room::latest()->get();
        return view('booking.create', compact('rooms'));
    }

    public function show($id)
    {
        
        $booking = Booking::find($id);
        $rooms = Room::find($booking->rooms);
        return view('booking.show', compact('booking', 'rooms'));
    }

    public function store(BookingRequest $request)
    {
            $attributes =  $request->all();
            

            $bookedRoom = Room::find($request->rooms);
            
            $totalBookedRoom = $bookedRoom->map(function ($query) {
                return (float) str_replace(',', '', $query->price);
            });
            $totalRoomPrice = $totalBookedRoom->sum();
            $checkInDate = Carbon::parse($request->check_in_date_time);
            $checkOutDate = Carbon::parse($request->check_out_date_time);

            $duration = $checkInDate->diff($checkOutDate);

            $total_cost = $duration->days * $totalRoomPrice;
            $no_of_rooms = count($request->rooms);

            $attributes['duration'] = $duration->days;
            $attributes['total_cost'] = $total_cost;
            $attributes['booking_type'] = 'Online';
            $attributes['no_of_rooms'] = $no_of_rooms;

    
            $user = User::firstOrCreate([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'gender' => $attributes['gender'],
                'phone_no'  => $attributes['phone']
            ]);
            
            $rooms = Room::find($attributes['rooms']);
            $attributes['user_id'] = $user->id;
            $booking = Booking::create($attributes);
               
            Mail::to($user)->send(new Invoice($booking, $rooms));
            
            $pdf = PDF::loadView('home', compact('rooms', 'booking'));
            
            return $pdf->download('invoice.pdf');
            
            // Alert::success('Booking Created Successfully');

            // return back();
    }

    
}