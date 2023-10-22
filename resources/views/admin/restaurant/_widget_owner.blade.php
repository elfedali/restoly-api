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
        <div class="mb-3">
            <label for="owner_id" class="form-label">{{ __('label.owner') }}</label>
            <select class="form-select @error('owner_id') is-invalid @enderror" id="owner_id" name="owner_id">
                <option value="0" @if (isset($restaurant) && $restaurant->owner_id == 0) selected @endif>
                    {{ __('label.no_owner') }}</option>

                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if (isset($restaurant) && $restaurant->owner_id == $user->id) selected @endif>
                        {{ $user->fullName() }} ({{ $user->email }})</option>
                @endforeach
            </select>
            @error('owner_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">{{ __('label.select_owner_help') }}</div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
