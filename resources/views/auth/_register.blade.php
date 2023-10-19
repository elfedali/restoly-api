<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="first_name">{{ __('auth.first_name') }}</label>
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="col-lg-6 mb-3">
            <label for="last_name">{{ __('auth.last_name') }}</label>
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- /.row -->
    {{-- username --}}
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="username">{{ __('auth.username') }}</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="col-lg-6 mb-3">
            <label for="email">{{ __('auth.email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    {{-- password --}}
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="password">{{ __('auth.password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="col-lg-6 mb-3">
            <label for="password-confirm">{{ __('auth.confirm_password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
        </div>
    </div>

    <div class="mb-0">

        <button type="submit" class="btn btn-primary">
            {{ __('auth.register') }}
        </button>
    </div>

    {{-- already have an account --}}
    <div class="mt-3">
        <p>
            {{ __('auth.already_account') }}
            <a class="btn btn-link" href="{{ route('login') }}">{{ __('auth.login') }}</a>
        </p>
    </div>
</form>
