<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InboxRequest;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ReplyMail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class InboxMessageController extends Controller
{
    public function index()
    {
        return view('inbox.index');
    }

    public function show($id)
    {
        $inbox = Contact::find($id);

        return view('inbox.show', compact('inbox'));
    }

    public function create($id)
    {
        $inbox = Contact::find($id);
        return view('inbox.create', compact('inbox'));
    }

    public function store(InboxRequest $request)
    {
        $replyMessage = $request->all();

        
        Mail::to($replyMessage['email'])->send(new ReplyMail($replyMessage));

        Alert('Message Sent Successfully');

        return redirect()->route('admin.inbox');
    }
}
