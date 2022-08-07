@extends('layouts.app')
@section('title', 'Gallery')

@section('css')

<link rel="stylesheet" href="{{ asset('styles/about.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('styles/image.css') }}" />
<link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
 <link rel="stylesheet" href="{{ asset('styles/lightbox.min.css') }}">

@endsection



@section('content')

@include('partial._top_nav', ['title' => 'Gallery'])

 <section style="padding: 50px 0px;">
     <div class="container">
             <div class=" grid sm:grid-cols-3 gap-10">
                @foreach($galleries as $gallery)
                 <a href="{{ $gallery->image }}" data-lightbox="mygallery" data-title="Instra1">
                     <img src="{{ $gallery->image }}" alt="">
                 </a>
                @endforeach
               
         </div>
     </div>
 </section>

@endsection

@section('gallery-script')
      <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
@endsection