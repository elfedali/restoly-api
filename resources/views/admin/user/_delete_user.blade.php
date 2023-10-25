<div class="card mt-4" id="delete-user">
    <div class="card-body">
        {{-- delete --}}
        <div class="text-right">
            <form action="{{ route('admin.user.delete-user', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                {{-- password --}}
                <div class="mb-3">
                    <label for="password_delete" class="form-label">{{ __('label.password') }}</label>
                    <input type="password" class="form-control @error('password_delete') is-invalid @enderror" id="password_delete"
                        name="password_delete" value="{{ old('password') }}">
                    @error('password_delete')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">{{ __('label.password-help') }}</div>
                </div>
                <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">
                    <i class="bi bi-trash"></i>
                    {{ __('label.delete') }}
                </button>
            </form>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@if(session('hash') == 'delete-user')
    <script>
        window.location.hash = '#delete-user';
    </script>
@endif
