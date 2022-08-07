<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $session = new Session();

        $roomsId = $session->get('rooms');
        $rooms = Room::find($roomsId);

        return view('page.checkout.index', compact(
            'rooms',
            'session'
        ));
    }
}