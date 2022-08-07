@extends('layouts.app')

@section('title', 'About us')

@section('css')

<link rel="stylesheet" href="{{ asset('styles/about.css') }}">

@endsection

@section('content')

@include('partial._top_nav', ['title' => 'About us', 'avaliableRooms' => $avaliableRooms])

@include('partial._about-area')
<div class="container">
    <div class="split_section_left container_custom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="">
                        <h2 class="font-semibold text-black">Unique Hospitality</h2>
                    </div>
                    <div class="about_text">
                        <p> The Global chelsea hotel is located in a privileged area in Benin city, Edo state. We offer our guests
                            comfort and security during their stay with us. The hotel offers facilities and amenities that will
                            ensure you have a pleasant stay with us. We have excellent services that guarantee you the best online
                            hotel bookings within the Benin city and most Nigerian cities. Our fees are very affordable for our
                            customers. </p>
                        <p> The Global Chelsea hotel is an excellent option for accommodation or hotel bookings in Nigeria.
                            Located just a few meters away from the popular Union houses of residence, we are your ideal choice for
                            reliable hotels and accommodations within Benin city, Edo state. </p>
                        <p> The Global Chelsea hotel is the perfect address for short-term, long-term lodging and accommodation in
                            Benin City. We provide a fantastic location and convenient amenities so that you can get comfortable at
                            our hotel fast. Guests enjoy access to kitchen facilities, all-day room service, concierge services, and
                            more at our accommodations.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <img class="img-responsive object-center object-contain object-fill" src="{{ asset('images/about.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
