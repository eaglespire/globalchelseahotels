<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index');
    }

    public function store(GalleryRequest $request)
    {
        $attributes = $request->all();
        $attributes['image'] = $request->hasFile('image') ? $request->image->store('gallery') : null;

        Gallery::create($attributes);

        Alert::success('Your Upload was Successful');
        return redirect()->route('admin.gallery');
    }
}