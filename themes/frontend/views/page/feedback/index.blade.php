@extends('layouts.app')

@section('title', 'Feedback')

@section('slider')

@include('partial._top_nav', ['title' => 'Feedback'])

@endsection

@section('content')
     <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Give us a Review </h2>
                </div>
                <div class="col-lg-8">
                <div class="p-3 bg-white rounded-md shadow-2xl">
                    <form class="form-contact contact_form" action="{{ route('feedback.store') }}" enctype="multipart/form-data" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea id="editor" class="form-control w-100" required name="reviews" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Type here...">
                                        {{old('reviews')}}
                                    </textarea>
                                    @error('reviews')
                                        <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" required="required" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    @error('name')
                                        <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" required name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    @error('email')
                                        <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label>Profile picture (optional)</label>
                                    <input class="form-control" required name="profile_pic" id="subject" type="file" onfocus="this.placeholder = ''" onblur="this.placeholder = '(Optional)'" placeholder="(Optional)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <center>
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </center>
                        </div>
                    </form>

                </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                <div class="bg-white p-3 rounded-md shadow-2xl">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3> Ekosodin, Benin City,</h3>
                            <p> Edo State, Nigeria. </p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+234 90 2535 652 36 </h3>
                            <p> Always Open 24/7 </p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="" class="__cf_email__" data-cfemail="">[email&#160;protected]</a></h3>
                            <p> Send us your Message anytime! We reply promptly. </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            {{-- Testimonial area --}}
            @if (!$testimonials->isEmpty())
            @include('partial._testimonial', compact('testimonials'))
            @endif
        </div>
    </section>
@endsection