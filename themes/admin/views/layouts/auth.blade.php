<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rhodaapartments') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/frontend') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/frontend') }}" rel="stylesheet">
    <style>
        .body-bg {
            background-color: whitesmoke;
           /* background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%); */
        }

    </style>

</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">

    <div id="app">

        <header class="max-w-lg mx-auto">
            <a href="#">
                <h1 class="text-4xl font-bold text-white text-center">
                    <center>
                        <a href="index.html text-center">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" class="w-52 object-center object-contain" alt="">
                        </a>

                    </center>

                </h1>
            </a>
        </header>

        <main class="w-full flex flex-wrap p-5">

            @yield('content')
        </main>

        <footer class="max-w-lg mx-auto flex justify-center text-white">
            <span>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());

                </script>
                All rights reserved | Powered by
                <a href="https://brykiva.com/" class="hover:underline" target="_blank"> Brykiva Solutions </a>


            </span>

        </footer>


    </div>
</body>
</html>
