{{-- include header --}}
@include('layouts._head')

<body @if (app()->getLocale() == 'ar') dir="rtl" @endif>
    @include('layouts._alerts')
    <div id="site-wrapper">
        @yield('content')
    </div>
</body>

</html>
