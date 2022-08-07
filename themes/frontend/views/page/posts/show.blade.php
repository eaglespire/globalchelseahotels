@extends('layouts.app')

@section('title', $post->title)


@section('css')
<link rel="stylesheet" href="{{ asset('styles/contact.css') }}">

@endsection


@section('content')

@include('partial._top_nav', ['title' => $post->title ])
<div class="container flex flex-wrap py-6">

    <!-- Post Section -->
    <section class="w-full md:w-2/3  flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ $post->image }}" class="object-center w-full object-cover object-contain">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">News</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                <p href="#" class="text-sm pb-8">
                    By <a href="#" class="font-semibold hover:text-gray-800">Admin</a>, Published on {{ $post->created_at->diffForHumans() }}
                </p>

                <p>
                    {!! $post->body !!}
                </p>
            </div>
        </article>

        <div class="w-full flex pt-6">
            @if ($previous)

            <a href="{{ route('posts.show', $previous->id) }}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">{{ $previous->title }}</p>
            </a>
            @else

            <a href="javascript:void(0)" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6 disabled" disabled="disabled">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2"></p>
            </a>


            @endif

            @if ($next)
            <a href="{{ route('posts.show', $next->id) }}" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">{{ $next->title }}</p>
            </a>
                @else
                 <a href="javascript:void(0)" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                     <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                     <p class="pt-2"></p>
                 </a>

            @endif
        </div>



    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">
                Global Chelsea Hotel is the perfect place for your accommodation, as we are committed to bringing you the best in hospitality. The hotel is located conveniently in a great neighborhood so that you can enjoy your stay at our place. We have rooms with full amenities that allow for a comfortable stay.
            </p>
            <a href="{{ route('about') }}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Our rooms</p>
            <div class="grid grid-cols-3 gap-3">
            @foreach($rooms as $room)
                <a href="{{ route('rooms.show', $room->id) }}">
                <img class="hover:opacity-75" src="{{ $room->image }}">
                </a>

            @endforeach
            </div>
            <a href="{{ route('rooms') }}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                View more
            </a>
        </div>

    </aside>

</div>

<section class="container p-6 p mx-auto bg-white dark:bg-gray-800">
    <h2 class="text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl">latest Posts</h2>

    <div class="flex items-center justify-center">
        <div class="grid gap-8 mt-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($latestPosts as $post)
            <div class="w-full max-w-xs text-center">
            <a href="{{ route('posts.show', $post->id) }}">

                <img class="object-cover object-center w-full h-48 mx-auto rounded-lg" src="{{ $post->image }}" alt="avatar" />

                <div class="mt-2">
                    <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">{{ $post->title }}</h3>
                    {{-- <span class="mt-1 font-medium text-gray-600 dark:text-gray-300">published by Admin</span> --}}
                </div>
            </a>
            </div>

            @endforeach


        </div>
    </div>
</section>




@endsection
