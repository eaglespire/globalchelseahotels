@extends('layouts.app')
@section('css')
 <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap-4.1.2/bootstrap.min.css') }}">

      <link rel="stylesheet" type="text/css" href="{{ asset('styles/blog.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/animate.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('styles/blog_responsive.css') }}">
@endsection
@section('title', 'Blog Post')

@section('content')

    @include('partial._top_nav', ['title' => 'Our blog'])

@include('partial._blog', compact('posts'))

@endsection
