 {{-- login form bootstrap --}}
 <form method="POST" action="{{ route('login') }}">
     @csrf
     <div class="mb-3">
         <label for="email">{{ __('auth.email') }}</label>
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
             value="{{ old('email') }}" required autocomplete="email" autofocus>

         @error('email')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>

     <div class="mb-3">
         <div class="d-flex justify-content-between align-items-baseline">
             <label for="password">{{ __('auth.password') }}</label>
             @if (Route::has('password.request'))
                 <a class="btn btn-link" href="{{ route('password.request') }}">
                     {{ __('auth.forgot') }}
                 </a>
             @endif
         </div>
         <!-- /.d-flex -->
         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
             name="password" required autocomplete="current-password">

         @error('password')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>

     <div class="mb-3">
         <div class="form-check">
             <input class="form-check-input" type="checkbox" name="remember" id="remember"
                 {{ old('remember') ? 'checked' : '' }}>

             <label class="form-check-label" for="remember">
                 {{ __('auth.remember') }}
             </label>
         </div>
     </div>

     {{-- submit --}}
     <div class="mb-0">
         <button type="submit" class="btn btn-primary">
             {{ __('auth.login') }}
         </button>
     </div>

     {{-- link to register --}}
     <div class="mt-3">
         <p>
             {{ __('auth.no_account') }}
             <a class="btn btn-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
         </p>
     </div>

 </form>
