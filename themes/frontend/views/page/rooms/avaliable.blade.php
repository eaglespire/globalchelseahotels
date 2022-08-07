@extends('layouts.app')

@section('title', 'Avaliable Rooms')

@section('slider')

@include('partial._top_nav', ['title' => 'Avaliable rooms'])

@endsection

@section('content')

<section class="room-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">

                <div class="font-back-tittle mb-45">
                    <div class="archivment-front">
                        <h3>Our Rooms</h3>
                    </div>
                    <h3 class="archivment-back">Our Rooms</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6">

                <div class="single-room mb-50">
                    <div class="room-img">
                        <a href="rooms.html"><img src="{{ asset('assets/img/rooms/room1.jpg') }}" alt=""></a>
                    </div>
                    <div class="room-caption">
                        <h3><a href="rooms.html">Classic Bed Rooms</a></h3>
                        <div class="per-night flex items-center justify-between">
                         <small class="text-muted bg-gray-200 px-1 py-1 rounded-2xl">Room price</small>
                         <span>₦150</span>
                        </div>
                        <button class="mt-2 text-white btn btn-block  d-sm-block">
                            Book this room
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">

                <div class="single-room mb-50">
                    <div class="room-img">
                        <a href="rooms.html"><img src="{{ asset('assets/img/rooms/room2.jpg') }}" alt=""></a>
                    </div>
                    <div class="room-caption">
                        <h3><a href="rooms.html">Classic Bed Rooms</a></h3>
                        <div class="per-night">
                            <!-- <span><u>$</u>150 <span>/ par night</span></span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">

                <div class="single-room mb-50">
                    <div class="room-img">
                        <a href="rooms.html"> <img src="{{ asset('assets/img/rooms/room3.jpg') }}" alt=""></a>
                    </div>
                    <div class="room-caption">
                        <h3><a href="rooms.html">Classic Bed Rooms</a></h3>
                        <div class="per-night">
                            <!-- <span><u>$</u>150 <span>/ par night</span></span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">

                <div class="single-room mb-50">
                    <div class="room-img">
                        <a href="rooms.html"><img src="{{ asset('assets/img/rooms/room4.jpg') }}" alt=""></a>
                    </div>
                    <div class="room-caption">
                        <h3><a href="rooms.html">Classic Bed Rooms</a></h3>
                        <div class="per-night">
                            <!-- <span><u>$</u>150 <span>/ par night</span></span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">

                <div class="single-room mb-50">
                    <div class="room-img">
                        <a href="rooms.html"><img src="{{ asset('assets/img/rooms/room5.jpg') }}" alt=""></a>
                    </div>
                    <div class="room-caption">
                        <h3><a href="rooms.html">Classic Bed Rooms</a></h3>
                        <div class="per-night">
                            <!-- <span><u>$</u>150 <span>/ par night</span></span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">

                <div class="single-room mb-50">
                    <div class="room-img">
                        <a href="rooms.html"> <img src="{{ asset('assets/img/rooms/room6.jpg') }}" alt=""></a>
                    </div>
                    <div class="room-caption">
                        <h3><a href="rooms.html">Classic Bed Rooms</a></h3>
                        <div class="per-night">
                            <!-- <span><u>$</u>150 <span>/ par night</span></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="room-btn pt-70">
                <a href="rooms.html" class="btn view-btn1">View more <i class="ti-angle-right"></i> </a>
            </div>
        </div>
    </div>
</section>



@endsection

