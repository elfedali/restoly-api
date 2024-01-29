<li class="nav-item">
    <a class="nav-link @if (request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        {{ __('label.dashboard') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link @if (request()->routeIs('admin.country.*')) active @endif" href="{{ route('admin.country.index') }}">
        <i class="bi bi-flag"></i>
        {{ __('label.countries') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  @if (request()->routeIs('admin.category.*')) active @endif" href="{{ route('admin.category.index') }}">
        <i class="bi bi-list-task"></i>
        {{ __('label.categories') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  @if (request()->routeIs('admin.currency.*')) active @endif"
        href="{{ route('admin.currency.index') }}">{{ __('label.currencies') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link  @if (request()->routeIs('admin.service.*')) active @endif"
        href="{{ route('admin.service.index') }}">{{ __('label.services') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link  @if (request()->routeIs('admin.restaurant.*')) active @endif" href="{{ route('admin.restaurant.index') }}">

        <i class="fas fa-utensils"></i>
        {{ __('label.restaurants') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  @if (request()->routeIs('admin.user.*')) active @endif" href="{{ route('admin.user.index') }}">
        <i class="fas fa-users"></i>
        {{ __('label.users') }}
    </a>
</li>
