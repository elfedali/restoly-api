@include('layouts._head')

<body @if (app()->getLocale() == 'ar') dir="rtl" @endif data-bs-theme="light">

    <div id="app">
        @include('layouts._navbar')
        @include('layouts._alerts')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>

</html>
