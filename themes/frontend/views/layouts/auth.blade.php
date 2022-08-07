<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/frontend') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/frontend') }}" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%);
        }

    </style>

</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">

    <div id="app">

        <header class="max-w-lg mx-auto">
            <a href="#">
                <h1 class="text-4xl font-bold text-white text-center">Rhodaapartments</h1>
            </a>
        </header>

        <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">

            @yield('content')
        </main>

        <footer class="max-w-lg mx-auto flex justify-center text-white">
            <a href="#" class="hover:underline">Contact</a>
            <span class="mx-3">•</span>
            <a href="#" class="hover:underline">Privacy</a>
        </footer>


    </div>
</body>
</html>
