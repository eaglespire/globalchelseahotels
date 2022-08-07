<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = User::latest()->paginate(8);
        return view('admin.newsletter.index', compact('subscribers'));
    }
}