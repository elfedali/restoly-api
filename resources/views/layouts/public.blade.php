<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel') }}

        @yield('title')
    </title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/sass/public.scss', 'resources/js/public.js'])

</head>

<body>

    <main>
        @yield('content')
    </main>

</body>

</html>
