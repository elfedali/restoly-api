
     <li class="nav-item">
         <a class="nav-link  @if (request()->routeIs('admin.restaurant.*')) active @endif"
             href="{{ route('admin.restaurant.index') }}">{{ __('label.restaurants') }}</a>
     </li>
     <li class="nav-item">
         <a class="nav-link  @if (request()->routeIs('admin.user.*')) active @endif"
             href="{{ route('admin.user.index') }}">{{ __('label.users') }}</a>
     </li>
 
