<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function index()
    {
        return view('rooms.index');
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function edit($room)
    {
        $room = Room::find($room);
        return view('rooms.edit', compact('room'));
    }

    public function show($room)
    {
        $room = Room::find($room);
        
        return view('rooms.show', compact('room'));
    }

    
    public function store(RoomRequest $request)
    {
        $attributes = $request->all();
        
        $image = $request->image ? $request->image->store('rooms') : '';
        
        $attributes['image'] = $image;
        
        Room::create($attributes);

        Alert::success('Room Created', 'Room has been created Successfully!!!');
        
        return redirect()->route('admin.room')->withSuccessMessage('Room created successfully!!!');
    }
    
    public function update(RoomRequest $request, $room)
    {
        $attributes = $request->all();

        
        $room = Room::find($room);
        
        $image = substr($room->image, 30, 30);

        $image = $request->image ? $request->image->store('rooms') : $image;

        $attributes['image'] = $image;

        $room->update($attributes);

        Alert::success('Room Updated', 'Room has been updated Successfully!!!');

        return redirect()->route('admin.room')->withSuccessMessage("Saved!!");
    }

}