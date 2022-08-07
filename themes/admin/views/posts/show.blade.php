@extends('layouts.app')

@section('title', $post->title )




@section('content')



<div class="container mt-5">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">Blog Post</h5>
        <a href="{{ route('admin.posts') }}" class="btn btn-primary float-right rounded"><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
        <div class="clearfix"></div>
    </div>


    <div class=" mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <img class="object-cover w-full h-96" src="{{ $post->image }}" alt="Article">

        <div class="p-6">
            <div>
                <span class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">Blog Post</span>
                <a href="#" class="block mt-2 text-2xl font-semibold text-gray-800 dark:text-white hover:text-gray-600 hover:underline">{{ $post->title }}</a>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{!! $post->body !!}</p>
            </div>

            <div class="mt-4">
                <div class="flex items-center">
                    <div class="flex items-center">
                        {{-- <img class="object-cover h-10 rounded-full" src="{{ $post->image }}" alt="Avatar"> --}}
                        <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200">Admin</a>
                    </div>
                    <span class="mx-1 text-xs text-gray-600 dark:text-gray-300">{{ $post->created_at }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
