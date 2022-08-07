@extends('layouts.app')

@section('title', 'Contact us')

@section('css')
<link rel="stylesheet" href="{{ asset('styles/contact.css') }}">

@endsection

@section('content')
@include('partial._top_nav', ['title' => 'Contact us'])

<div class="contact">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="contact_content">
                    <div class="contact_title">
                        <h2> Get in touch </h2>
                    </div>
                    <div class="contact_list">
                        <ul>
                            <li> Along road, Benin city, Edo State Nigeria </li>
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


        </div>
    </div>
</div>

@endsection
