<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session;

class BookController extends Controller
{
    public function index()
    {
        return view('page.book');
    }

    public function store(StoreBookRequest $request)
    {

        $attributes = $request->all();
        $bookedRoom = Room::find($request->rooms);

       


        $totalBookedRoom = $bookedRoom->map(function($query) {
                return (float) str_replace(',', '', $query->price);
        });
        

       $totalRoomPrice =$totalBookedRoom->sum();

        $checkInDate = Carbon::parse($request->check_in_date);
        $checkOutDate = Carbon::parse($request->check_out_date);

        $duration = $checkInDate->diff($checkOutDate);

        $total_cost = $duration->days * $totalRoomPrice;
        $no_of_rooms = count($request->rooms);

        $attributes['duration'] = $duration->days;
        $attributes['total_cost'] = $total_cost;
        $attributes['booking_type'] = 'Online';
        $attributes['no_of_rooms'] = $no_of_rooms;

    
        // session()->put($attributes);
        $session = new Session();
        $session->set('check_in_date', $attributes['check_in_date']);
        $session->set('check_out_date', $attributes['check_out_date']);
        $session->set('no_of_adult', $attributes['no_of_adult']);
        $session->set('no_of_children', $attributes['no_of_children']);
        $session->set('no_of_rooms', $attributes['no_of_rooms']);
        $session->set('duration', $attributes['duration']);
        $session->set('total_cost', $attributes['total_cost']);
        $session->set('rooms', $attributes['rooms']);
        $session->set('booking_type', $attributes['booking_type']);


        $roomsId = $session->get('rooms');
        $rooms = Room::find($roomsId);

        
        return view('page.checkout.index', compact('rooms', 'session'));
    }
}