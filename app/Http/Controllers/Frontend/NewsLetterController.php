<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsLetterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsLetterController extends Controller
{
    public function store(NewsLetterRequest $request)
    {
        $attributes = $request->all();

        $user = User::where('email', $attributes['email'])
                    ->first();

        if ($user) {
            Alert::success('You have already subscribe before');

            return back();
        } else {
            User::create($attributes);
            
            // send email verification message to their email

            Alert::success('Your subscription was successful.');

            return back();
        }
    }
}