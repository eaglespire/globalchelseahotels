@extends('layouts.app')
@section('title', 'Gallery')

@section('css')

    <link rel="stylesheet" href="{{ asset('styles/about.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('styles/image.css') }}" />
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/lightbox.min.css') }}">

@endsection

@push('update-styles')
    <style>
        .zoom_gallery{
            transition: transform .2s; /* Animation */
        }
        .zoom_gallery:hover {
            transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            /*background-color: rgba(0,123,255,0.55);*/
        }
        .transition_gallery_container{
            background-color: transparent;
            transition: 0.3s;
        }
        .transition_gallery_container:hover{
            background-color: rgba(0,123,255,0.55);
            /*border: 1px solid red;*/
        }
    </style>
@endpush

@push('update-scripts')
    <script src="{{ asset('js/alpine.js') }}"></script>
    <script>
        function buildGallery() {
            return {
                items: [
                    {id:1,title:'Bar',image:'/images/update/bar_1.webp'},
                    {id:2,title:'Restaurant',image:'/images/update/bar_2.webp'},
                    {id:3,title:'Bar',image:'/images/update/bar_3.webp'},
                    {id:4,title:'Bar and Restaurant',image:'/images/update/bar_4.webp'},
                    {id:5,title:'Car Park',image:'/images/update/car_park.webp'},
                    {id:6,title:'laundry',image:'/images/update/lun_1.webp'},
                    {id:7,title:'Room',image:'/images/update/chel_1.webp'},
                    {id:8,title:'Room',image:'/images/update/chel_2.webp'},
                    {id:9,title:'Room',image:'/images/update/chel_3.webp'},
                    {id:10,title:'Room',image:'/images/update/chel_4.webp'},
                    {id:11,title:'Room',image:'/images/update/chel_5.webp'},
                    {id:12,title:'Room',image:'/images/update/chel_6.webp'},
                ]
            }
        }
    </script>
@endpush

@section('content')

    @include('partial._top_nav', ['title' => 'Gallery'])

    <section style="padding: 50px 0px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    @include('page._gallery')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('gallery-script')
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
@endsection
