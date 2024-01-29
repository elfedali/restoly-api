<ul class="nav nav-underline">
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.edit')) active @endif"
            href="{{ route('admin.restaurant.edit', $restaurant) }}">
            @lang('label.general')
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.menu.*')) active @endif"
            href="{{ route('admin.restaurant.menu.index', $restaurant) }}">
            @lang('label.menu')
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.review.*')) active @endif"
            href="{{ route('admin.restaurant.review.index', $restaurant) }}">
            @lang('label.reviews')
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.image.*')) active @endif"
            href="{{ route('admin.restaurant.image.index', $restaurant) }}">
            @lang('label.photos')
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.phone.*')) active @endif"
            href="{{ route('admin.restaurant.phone.index', $restaurant) }} ">
            @lang('label.phones')
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.address.*')) active @endif"
            href="{{ route('admin.restaurant.address.index', $restaurant) }} ">
            @lang('label.address')
        </a>
    </li>
    {{-- link --}}
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.link.*')) active @endif"
            href="{{ route('admin.restaurant.link.index', $restaurant) }} ">
            @lang('label.links')
        </a>
    </li>
    {{-- opning Hours --}}
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.openingHour.*')) active @endif"
            href="{{ route('admin.restaurant.openingHour.index', $restaurant) }} ">
            @lang('label.opening_hours')
        </a>
    </li>
    {{-- Reservation --}}
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.restaurant.reservation.*')) active @endif"
            href="{{ route('admin.restaurant.reservation.index', $restaurant) }} ">
            @lang('label.reservations')
        </a>
    </li>
</ul>
