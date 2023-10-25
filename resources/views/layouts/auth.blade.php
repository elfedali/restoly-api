{{-- include header --}}
@include('layouts._head')

<body @if (app()->getLocale() == 'ar') dir="rtl" @endif data-bs-theme="dark">
    @include('layouts._alerts')
    <div id="site-wrapper">
        @yield('content')
    </div>
</body>

</html>
