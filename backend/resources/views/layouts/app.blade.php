<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/assets/img/logo/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Progetto finale Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <style>
        main {
            min-height: 80vh;
            margin: 2vh 0 3vh;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div id="app">

        @include('./layouts/partials/header')

        <main>
            <div class="container">

                @yield('content')

            </div>
        </main>

        @include('./layouts/partials/footer')
    </div>
</body>

</html>