@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class=" mb-3">


        <label for="email">{{ __('auth.email') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>

    <div class="mb-0">
        <button type="submit" class="btn btn-primary">
            {{ __('auth.send') }}
        </button>
    </div>

    {{-- already have an account --}}
    <div class="mt-3">
        <p>
            <a href="{{ route('login') }}">{{ __('auth.already_account') }}</a>
        </p>
    </div>
</form>
