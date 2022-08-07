@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
        <section class="py-5">
            <div class="mb-4">
                <div class="flex items-center justify-between">
                    <h5 class="title-heading d-inline-block float-left">Gallery</h5>
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" />
                        @error('image')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <input type="submit" value="Submit" class="bg-yellow-600 hover:bg-yellow-500 rounded-2xl text-white p-2 shadow-lg">
                    </form>
                    
                
                </div>
                <div class="clearfix"></div>
            </div>

           @livewire('admin.gallery-list')

        </section>
@endsection