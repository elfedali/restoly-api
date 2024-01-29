<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->fullName() }}
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        {{-- email --}}
        <a class="dropdown-item active" href="#">
            <div>
                <i class="bi bi-envelope"></i>

                {{ Auth::user()->email }} <br>
                <i class="bi bi-person"></i>
                <b> {{ Auth::user()->role }}</b>
                <section>
                    {{ __('label.member-since') }} : <br>
                    {{ Auth::user()->created_at->format('d/m/Y') }} <br />
                    {{ Auth::user()->created_at->diffForHumans() }}
                </section>
            </div>
        </a>
        {{-- edit profile --}}
        <a class="dropdown-item" href="{{ route('admin.user.show', Auth::user()) }}">
            <i class="bi bi-person-lines-fill"></i>
            {{ __('label.account') }}
        </a>
        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
