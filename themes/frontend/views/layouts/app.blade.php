<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Global Chelsea hotel is located on the heart of Benin-city Edo state capital, one of Nigeria's largest, commercial city">
    <meta name="keyword" content="global Chelsea, hotel, low price, Apartments, luxury, comfort, leisure, guest, hotel, benin city, rooms, book, online, home, about us, services, satisfaction,">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Globalchelseahotel') }}</title>

    @include('partial._style')


    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/frontend') }}"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/frontend') }}" rel="stylesheet">


    @livewireStyles

    @yield('css')
    @stack('update-styles')
    <style>
        #customCard{
            background: #fff;
            box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
            cursor: pointer;
        }
        #customCard:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            cursor: pointer;
        }
        #mt-lg-20{
            margin-right:12rem!important
        }
        .logo {width:230px;height:61px;text-align:center;}
    </style>
</head>
<body>
<div class="super_container">

    @include('partial._header')
    @yield('content')
    @include('partial._footer')

</div>
<link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}" />
<script src="{{ asset('select2/js/jquery.js') }}"></script>

<script src="{{ asset('select2/js/select2.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#e9').select2({
            placeholder: "Select Rooms"
            , selectionCssClass: "bg-opacity-50 focus:border-yellow-500 focus:bg-transparent focus:ring-2 focus:ring-yellow-500 leading-8 transition-colors duration-200 ease-in-out text-base text-gray-700 rounded max-h-14 h-14 border-yellow-500"
            , allowClear: true
            , })
    });

</script>

{{-- @livewireScripts --}}

@include('sweetalert::alert')


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor');
</script>
@include('partial._script')


@stack('update-scripts')
</body>
</html>
