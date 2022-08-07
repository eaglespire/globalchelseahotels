<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutUsController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'image' => 'required|image:jpg,jpeg,png',
            'content'=>  'required|string'
            ]);

        $image = $request->hasFile('image') ? $request->image->store('about-image') : NULL;
        $attributes['image'] = $image;
        $atrributes['id'] = 1;
        $aboutUs = AboutSection::updateOrCreate(['id' => 1],$attributes);

        Alert::success('Section Created', 'About us section created Successfully!!!');

            return redirect()->route('admin.about-us');
        
    }
}