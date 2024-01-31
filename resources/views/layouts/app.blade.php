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
    @yield('css')
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body @if (app()->getLocale() == 'ar') dir="rtl" @endif data-bs-theme="light">
    @php
        $menu_classes = Auth::user()->role == \App\Models\User::ROLE_ADMIN ? 'navbar-dark bg-dark' : 'navbar-dark bg-primary';
    @endphp
    <div class="layout-app" id="app">

        @include('layouts._app_navbar')

        <main class="main-container">
            @include('inc.menu.top')
            @include('layouts._alerts')
            <section class="main-content mt-3">
                @yield('content')
            </section>

        </main>
    </div>
    @yield('scripts')
</body>

</html>
