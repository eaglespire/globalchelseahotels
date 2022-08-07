<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show($post)
    {
        $post = Post::find($post);

        return view('posts.show', compact('post'));
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('posts.edit', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $attributes = $request->all();

        $attributes['admin_id'] = Auth::id();
        
        $attributes['image'] = $request->has('image') ? $request->image->store('posts') : NULL; 
        
        Post::create($attributes);

        Alert::success('Post Created', 'Post has been created Successfully!!!');        

        return redirect()->route('admin.posts');
    }

    public function update(PostRequest $request, $post)
    {
        $attributes = $request->all();

        $attributes['admin_id'] = Auth::id();

        $post = Post::find($post);

        $image = substr($post->image, 30, 30);

        $attributes['image'] = $request->has('image') ? $request->image->store('posts') : $image;

        $post->update($attributes);

        Alert::success('Post Updated', 'Post has been updated Successfully!!!');

        return redirect()->route('admin.posts');
    }
}