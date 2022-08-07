<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BulkEmailRequest;
use App\Mail\BulkMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BulkEmailController extends Controller
{
    public function index()
    {
        return view('bulk-email.index');
    }

    public function store(BulkEmailRequest $request)
    {
        $attributes = $request->all();

        $guests = User::all();

        if (!$guests->isEmpty()) {
            $guests->each(function($guest) use($attributes) {
                return Mail::to($guest)->send(new BulkMessage($attributes, $guest));
            });
    
            Alert::success('Sent', 'Message sent successfully!!!.');
        }

        return redirect()->route('bulk-email');
        
    }
}