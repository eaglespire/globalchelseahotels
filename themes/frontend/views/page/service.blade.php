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
                    <h2> Global Chelsea Hotel - over 20 years of Hospitality </h2>
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
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="split_section_image split_section_left_image">
                    <div class="">
                        <img src="{{ asset('images/loaders.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 split_section_title">
                <div class="split_section_title">
                    <h2>Luxury Resort</h2>
                </div>
                <p>
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                    Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum, a bibendum
                    lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum,
                    a bibendum lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus
                    et ultrices posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci.
                </p>
                <div class="loaders_container d-flex flex-row align-items-start justify-content-start flex-wrap">
                    <div class="loader_container text-center">
                        <div class="loader text-center" data-perc="0.9">
                            <div class="loader_content">
                                <div class="milestone_counter pb-3" data-end-value="45">0</div>
                                <div class="loader_title">Rooms available</div>
                            </div>
                        </div>
                    </div>
                    <div class="loader_container text-center">
                        <div class="loader text-center" data-perc="0.8">
                            <div class="loader_content">
                                <div class="milestone_counter pb-3" data-end-value="21" data-sign-after="K">0</div>
                                <div class="loader_title">Tourists this year</div>
                            </div>
                        </div>
                    </div>
                    <div class="loader_container text-center">
                        <div class="loader text-center" data-perc="1.0">
                            <div class="loader_content">
                                <div class="milestone_counter pb-3" data-end-value="2">0</div>
                                <div class="loader_title">Swimming pools</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>The Bar and Restaurant</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur ipsa ipsum,
                    facere minima doloremque repudiandae repellendus vel id quidem laudantium quam possimus,
                    officia sint aperiam commodi. Aut similique minima iusto?
                </p>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bar_image">
                    <img src="{{ asset('custom/image/Chelsea Hotel-41.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="wedding_value mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="split_section_image split_section_left_image">
                    <div class="">
                        <img src="images/loaders.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="split_section_title">
                    <h2>Wedding venue</h2>
                </div>
                <p>
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                    Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum, a bibendum
                    lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum,
                    a bibendum lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus
                    et ultrices posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci.
                </p>
                <div class="loaders_container d-flex flex-row align-items-start justify-content-start flex-wrap">
                    <div class="loader_container text-center">
                        <div class="loader text-center" data-perc="0.9">
                            <div class="loader_content">
                                <div class="loader_title">Good Services</div>
                            </div>
                        </div>
                    </div>
                    <div class="loader_container text-center">
                        <div class="loader text-center" data-perc="0.8">
                            <div class="loader_content">
                                <div class="loader_title">Tourists</div>
                            </div>
                        </div>
                    </div>
                    <div class="loader_container text-center">
                        <div class="loader text-center" data-perc="1.0">
                            <div class="loader_content">
                                <div class="loader_title">Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>Tight Security</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur ipsa ipsum,
                    facere minima doloremque repudiandae repellendus vel id quidem laudantium quam possimus,
                    officia sint aperiam commodi. Aut similique minima iusto?
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
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="split_section_image split_section_left_image">
                    <div class="">
                        <img src="{{ asset('custom/image/Chelsea Hotel-5.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="split_section_title">
                    <h2>24/7 Power Supply</h2>
                </div>
                <p>
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                    Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum, a bibendum
                    lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                    posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum,
                    a bibendum lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus
                    et ultrices posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="mt-20 mb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>Testy Meats</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur ipsa ipsum,
                    facere minima doloremque repudiandae repellendus vel id quidem laudantium quam possimus,
                    officia sint aperiam commodi. Aut similique minima iusto?
                </p>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="bar_image">
                    <img src="{{ asset('custom/image/6.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
