{{-- change  --}}
<div class="card mt-4" id="change-email">
    <div class="card-body">
        <h5>
            {{ __('label.change-email') }}
        </h5>
        <form action="{{ route('admin.user.update-email', $user) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('label.email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">{{ __('label.email-help') }}</div>
            </div>
            {{-- password --}}
            <div class="mb-3">
                <label for="password_edit" class="form-label">{{ __('label.password') }}</label>
                <input type="password" class="form-control @error('password_edit') is-invalid @enderror" id="password_edit"
                    name="password_edit" value="{{ old('password') }}">
                @error('password_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">{{ __('label.password-help') }}</div>
            </div> 
            
            <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@if(session('hash') == 'change-email')
    <script>
        window.location.hash = '#change-email';
    </script>
@endif