@extends('layouts.app')

@section('title', 'Contact us')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/contact.css') }}">

@endsection

@section('content')
    @include('partial._top_nav', ['title' => 'Contact us'])

    <div class="contact">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="contact_content">
                        <div class="contact_title">
                            <h2> Get in touch </h2>
                        </div>
                        <div class="contact_list">
                            <ul>
                                <li> 20 Osayogie street off Benin Lagos express road, Idumwowina Quarter Benin City </li>
                                <li> +234 803-218-7719 </li>
                            </ul>
                        </div>
                        <div class="contact_form_container">
                            <form action="{{ route('contact-us.store') }}" method="post" class="contact_form" id="contact_form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 input_container">
                                        <input type="text" name="name" class="border border-1 contact_input" placeholder="Your name" required>

                                    </div>
                                    <div class="col-md-6 input_container">
                                        <input type="email" name="email" class="border border-1 contact_input" placeholder="Your email address" required>
                                    </div>
                                </div>
                                <div class="input_container"><input type="text" name="subject" class="border border-1 contact_input" placeholder="Subject" required></div>

                                <div class="input_container"><textarea required name="message" class="border border-1 contact_input contact_textarea" placeholder="Message"></textarea></div>
                                <button class="contact_button">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="mt-lg-5 mt-md-5 mt-4 pt-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7902189829674!2d5.6042993999999995!3d6.4209947000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10472d5698854c65%3A0x75057520e0192016!2sGLOBAL%20CHELSEA%20HOTEL!5e0!3m2!1sen!2sng!4v1655613768782!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
