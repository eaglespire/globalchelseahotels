<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function show($id)
    {
        return view('guest.show');
    }
}