@extends('layouts.app')

@section('title', 'Services')

@section('css')

    <link rel="stylesheet" href="{{ asset('styles/about.css') }}">

@endsection

@section('content')

    @include('partial._top_nav', ['title' => 'Services'])

    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_title">
                        <h2> Global Chelsea Hotel - over 17 years of Hospitality </h2>
                    </div>
                </div>
            </div>
            <div class="row about_row">

                <div class="col-lg-6">
                    <div class="about_content">
                        <div class="about_text">
                            <p> Global Chelsea Hotel is the perfect place for your accommodation, as we are committed to bringing
                                you the best in hospitality. The hotel is located conveniently in a great neighborhood so that you can
                                enjoy your stay at our place. We have rooms with full amenities that allow for a comfortable stay.
                            </p>
                            <p> Global Chelsea Hotel is the perfect stop for your business or leisure stay. Our hotel provides you
                                with all the amenities that you need to make your trip more enjoyable. We are in an excellent location
                                in Benin city. Our hotel offers rooms with air conditioning, cable TV, modern decor, and more. If
                                you’re traveling on a budget, our rooms offer the best valued room for your money. </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about_images d-flex flex-row align-items-start justify-content-between flex-wrap">
                        <img src="{{ asset('images/xabout_1.png.pagespeed.ic.G-VOApQoXo.png') }}" alt="">
                        <img src="{{ asset('images/xabout_2.png.pagespeed.ic.2ktwyxw6Wl.png') }}" alt="">
                        <img src="{{ asset('images/xabout_3.png.pagespeed.ic.zk3JXEOXM4.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="wedding_value">
        <div class="container">
            @include('page.services._our_rooms')
        </div>
    </section>

    <section class="mt-20">
        <div class="container">
            @include('page.services._bar_restaurant')
        </div>
    </section>


    <section class="wedding_value mt-20">
        <div class="container">
            @include('page.services._wedding_hall')
        </div>
    </section>

    <section class="mt-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <h2>Tight Security</h2>
                    <p>
                        We extremely care about the safety of our esteemed customers, that is why we have gallantly put in place 24hr power surveillance
                        supply with 24/7 security service and area security patrol support.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="bar_image">
                        <img src="{{ asset('custom/image/Chelsea Hotel-20.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wedding_value mt-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <h2>24/7 Power Supply</h2>
                    <p>
                        With our 24/7 power supply you do not have to worry about your gadget being low, or your experience not complete.
                        Power is always available for you to carry out any task you so desire to take.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="bar_image">
                        <img src="/custom/image/Chelsea Hotel-5.jpg" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-20 mb-20">
        <div class="container">
            @include('page.services._laundry')
        </div>
    </section>

    <section class="mt-20 mb-20">
        <div class="container">
            @include('page.services._mini_super_mkt')
        </div>
    </section>

    <section class="mt-20 mb-20">
        <div class="container">
            @include('page.services._car_pack')
        </div>
    </section>
@endsection
