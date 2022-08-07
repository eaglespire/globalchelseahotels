<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rhoda Luxury Apartments, provides you the comfort and leisure of a home outside a home">
    <meta name="keyword" content="rhoda, Apartments, luxury, comfort, leisure, guest, house, ekosodin, rooms, book, online, home, about us, services, satisfaction,">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

{{-- <script src="/ckeditor.js"></script> --}}


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Globalchelseahotel') }}</title>


    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/fontawesome/css/all.min.css') }}">


    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/admin') }}" rel="stylesheet">

    <!-- orion icons-->
    @yield('css')

    
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.sea.css') }}" id="theme-stylesheet">
    @livewireStyles


</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100">
    
    @include('partial._header')

    <div class="d-flex align-items-stretch">
        @include('partial._sidebar')

        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-5">

                @yield('content')

            </div>

            @include('partial._footer')
        </div> {{-- end of page-holder --}}
    </div>
    {{-- </div> --}}

    @include('partial._script')
    @include('sweetalert::alert')

    @yield('script')
    <script type="text/javascript">
        $(function() {
            @if(request()->is('foodcategories*') || request()->is('menus*') || request()->is('orders*'))
            $('#pages2').collapse('show');
            @endif

            @if(request()->is('services*') || request()->is('usedservices'))
            $('#pages').collapse('show');
            @endif
        })

    </script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
   <script>
       CKEDITOR.replace('editor');

   </script>




    @livewireScripts

</body>
</html>
