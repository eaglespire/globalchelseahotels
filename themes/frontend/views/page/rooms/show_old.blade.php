@extends('layouts.app')

@section('title', $room->name)

@section('css')

<link rel="stylesheet" href="{{ asset('styles/about.css') }}">

@endsection


@section('content')
@include('partial._top_nav', ['title' => $room->name ])
<div class="container flex flex-wrap py-6">

    <!-- Post Section -->
    <section class="w-full md:w-2/3  flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ $room->image }}" class="object-center w-full object-cover object-contain">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $room->status }}</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $room->name }}</a>
                <span class="text-right font-weight-bold text-2xl">₦{{ $room->price }}</span>

                {{-- <p href="#" class="text-sm pb-8">
                    By <a href="#" class="font-semibold hover:text-gray-800">Admin</a>, Published on {{ $post->created_at }}
                </p> --}}

                <p>
                    {!! $room->description !!}
                </p>
            </div>
        </article>

        {{-- <div class="w-full flex pt-6">
            @if ($previous)

            <a href="{{ route('rooms.show', $previous->id) }}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">{{ $previous->name }}</p>
            </a>
            @else

            <a href="javascript:void(0)" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6 disabled" disabled="disabled">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">{{ $next->name }}</p>
            </a>


            @endif

            @if ($next)
            <a href="{{ route('posts.show', $next->id) }}" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
            @else
            <a href="javascript:void(0)" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>

            @endif
        </div> --}}



    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
{{-- 
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">{!! \Str::limit($about->content, 210) !!}</p>
            <a href="{{ route('about') }}" class="w-full bg-yellow-600 text-white font-bold text-sm uppercase rounded hover:bg-yellow-500 flex items-center justify-center px-2 py-3 mt-4">
               Read more
            </a>
        </div> --}}

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Our rooms</p>
            <div class="grid grid-cols-3 gap-3">
                @foreach($rooms as $room)
                <a href="{{ route('rooms.show', $room->id) }}">
                    <img class="hover:opacity-75" src="{{ $room->image }}">
                </a>

                @endforeach
            </div>
            <a href="{{ route('rooms') }}" class="w-full bg-yellow-600 text-white font-bold text-sm uppercase rounded hover:bg-blue-500 flex items-center justify-center px-2 py-3 mt-6">
                View more
            </a>
        </div>

    </aside>

</div>


@endsection
