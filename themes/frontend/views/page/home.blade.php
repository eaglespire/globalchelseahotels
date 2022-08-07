@extends('layouts.app')

@section('title', 'Home')

@section('content')
{{-- Booking area --}}
@include('partial._booking-area', ['title' => 'A Luxury Stay', 'rooms' => $rooms])
{{-- Feature area --}}
@include('partial._feature')
{{-- About us area --}}
@include('partial._about-area', compact('about'))
{{-- Room area --}}
@if (!$rooms->isEmpty())
@include('partial._room-area', compact('rooms'))
@endif


{{-- Blog area --}}

@if (!$posts->isEmpty())

@include('partial._posts', compact('posts'))
@endif

{{-- Testimonial area --}}
@if (!$testimonials->isEmpty())
@include('partial._testimonial', compact('testimonials'))
@endif


@endsection

