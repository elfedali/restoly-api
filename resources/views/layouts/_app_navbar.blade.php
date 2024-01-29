<nav class="navbar navbar-expand-md p-0 ps-2 pt-1 {{ $menu_classes }} ">

    <a class="navbar-brand" href="{{ url('/') }}">
        <i class="fas fa-utensils me-2"></i>
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu"
        aria-controls="main-menu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main-menu">
        <nav class="navbar-nav me-auto">

            @if (Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                @include ('inc.menu.admin')
            @elseif(Auth::user()->role == \App\Models\User::ROLE_COMMERCIAL)
                @include ('inc.menu.commercial')
            @endif

            {{-- @include('inc.menu.account') --}}
        </nav>

    </div>

</nav>
