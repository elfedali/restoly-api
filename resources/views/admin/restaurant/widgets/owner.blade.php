<div class="card mt-4">
    <div class="card-header">
        <h5>{{ __('label.owner') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        @php
            $users = App\Models\User::all();
        @endphp

        {{-- select owner_id:fullName(email) --}}
        <div class="mb-3 d-flex ">
            <div>
                <label for="owner_id" class="form-label">{{ __('label.owner') }}</label>
                <select class="form-select @error('owner_id') is-invalid @enderror" id="owner_id" name="owner_id">
                    <option value="0" @if (isset($restaurant) && $restaurant->owner_id == 0) selected @endif disabled selected>
                        {{ __('label.no_owner') }}</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            @if (isset($restaurant) && $restaurant->owner_id == $user->id) selected
                        @elseif (old('owner_id') == $user->id) selected @endif>
                            #{{ $user->id }} {{ $user->fullName() }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                @error('owner_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">{{ __('label.select_owner_help') }}</div>
            </div>
        </div>
        <div>
            {{-- create user --}}
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-user-plus me-1"></i>
                {{ __('label.create_user') }}
            </a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
