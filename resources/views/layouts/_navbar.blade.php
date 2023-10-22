  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu"
              aria-controls="main-menu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="main-menu">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                      <a class="nav-link @if (request()->routeIs('admin.country.*')) active @endif"
                          href="{{ route('admin.country.index') }}">{{ __('label.countries') }}</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link  @if (request()->routeIs('admin.category.*')) active @endif"
                          href="{{ route('admin.category.index') }}">{{ __('label.categories') }}</a>
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
                      <a class="nav-link  @if (request()->routeIs('admin.restaurant.*')) active @endif"
                          href="{{ route('admin.restaurant.index') }}">{{ __('label.restaurants') }}</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link  @if (request()->routeIs('admin.user.*')) active @endif"
                          href="{{ route('admin.user.index') }}">{{ __('label.users') }}</a>
                  </li>
              </ul>
              <div class="ms-auto">
                  <form method="POST" action="{{ route('language.switch') }}">
                      @csrf

                      <select name="locale" onchange="this.form.submit()" class="form-select form-select-sm">
                          <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                          <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>Arabic</option>
                          <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>French</option>
                      </select>
                  </form>
              </div>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav">
                  <!-- Authentication Links -->
                  @guest
                      @if (Route::has('login'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                      @endif

                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->fullName() }}
                          </a>

                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              {{-- email --}}
                              <a class="dropdown-item disabled" href="#">
                                  <div>
                                      <i class="bi bi-envelope"></i>

                                      {{ Auth::user()->email }} <br>
                                      <i class="bi bi-person"></i>
                                      <b> {{ Auth::user()->is_admin ? 'Admin' : '' }}</b>
                                      <section>
                                          {{ __('label.member-since') }} : <br>
                                          {{ Auth::user()->created_at->format('d/m/Y') }} <br />
                                          {{ Auth::user()->created_at->diffForHumans() }}
                                      </section>
                                  </div>
                              </a>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
