@extends('layouts.app')

@section('title', 'Our Rooms')

@section('css')
    <link rel="stylesheet" href="{{ asset('styles/booking.css') }}">

@endsection



@section('content')
@include('partial._top_nav', ['title' => 'Our Rooms'])

@include('partial._room-area', compact('rooms'))

@endsection

