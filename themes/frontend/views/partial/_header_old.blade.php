@php
use Symfony\Component\HttpFoundation\Session\Session;
@endphp
<header class="header">
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="ml-auto d-flex flex-row align-items-center justify-content-start">
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a class="" href="/">Home</a></li>
                    <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a class="" href="{{ route('about') }}">About</a></li>
                    <li class="{{ request()->is('our-rooms') ? 'active' : '' }}"><a class="" href="{{ route('rooms') }}">Rooms</a></li>
                    <li class="{{ request()->is('services') ? 'active' : '' }}"><a class="" href="{{ route('services') }}"> Services </a></li>
                    <li class="{{ request()->is('posts') ? 'active' : '' }}"><a class="" href="{{ route('posts') }}"> Blog </a></li>
                    <li class="{{ request()->is('gallery') ? 'active' : '' }}"><a class="" href="{{ route('gallery') }}"> Gallery </a></li>
                    <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a class="" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
            <div class="book_button"><a href=""> Quick Bookings </a></div>
            <div class="header_phone d-flex flex-row align-items-center justify-content-center">
                <img src="/images/xphone.png.pagespeed.ic.bcttyGCy-j.png" alt="">
                <span> +234 803-218-7719 </span>
            </div>

            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        </div>
    </div>
</header>


<div class="menu trans_400 d-flex flex-column align-items-end justify-content-start">
    <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="menu_content">
        <nav class="menu_nav text-right">
            <ul>
                <li><a href="/">Home</a></li>
                <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="{{ route('about') }}">About us</a></li>
                <li class="{{ request()->is('our-rooms') ? 'active' : '' }}"><a href="{{ route('rooms') }}">Rooms</a></li>
                <li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{ route('services') }}"> Services </a></li>
                <li class="{{ request()->is('posts') ? 'active' : '' }}"><a href="{{ route('posts') }}"> Blog </a></li>
                <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>

            </ul>
        </nav>
    </div>
    <div class="menu_extra">
        <div class="menu_book text-right"><a href="#"> Quick Bookings </a></div>
        <div class="menu_phone d-flex flex-row align-items-center justify-content-center">
            <img src="/images/xphone-2.png.pagespeed.ic.yPnh2CgxgD.png" alt="">
            <span> +234 803-218-7719 </span>
        </div>
    </div>
</div>
