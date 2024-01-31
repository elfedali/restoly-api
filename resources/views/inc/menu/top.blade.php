<div class="menu-top bg-dark d-flex justify-content-between px-3">

    <section>

        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-plus"></i>
                <span>
                    {{ __('label.new') }}
                </span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('admin.user.create') }}">{{ __('label.user') }}</a></li>
                <li><a class="dropdown-item"
                        href="{{ route('admin.restaurant.create') }}">{{ __('label.restaurant') }}</a></li>
            </ul>

        </div>
    </section>
    <section>
        {{-- connected user drop down as in the wordpress admin , add font awsome icons --}}
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span>
                    {{ Auth::user()->fullName() }}
                </span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item"
                        href="
                    {{ route('admin.user.show', ['user' => Auth::user()->id]) }}
                    ">{{ __('label.profile') }}</a>
                </li>
                {{-- <li><a class="dropdown-item" href="#">{{ __('label.settings') }}</a></li> --}}
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt text-danger"></i>
                        {{ __('label.logout') }}
                    </a>
                </li>
            </ul>
        </div>


    </section>
</div>
