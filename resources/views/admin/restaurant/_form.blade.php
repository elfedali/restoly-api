<div class="card">
    <div class="card-body">
        {{-- name --}}
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('label.name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ isset($restaurant) ? $restaurant->name : old('name') }}" placeholder="{{ __('label.name') }}"
                aria-describedby="nameHelp">
            @error('name')
                <div id="nameHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
            <div id="nameHelp" class="form-text">{{ __('label.name_help') }}</div>
        </div>

        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('label.description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                rows="3" placeholder="{{ __('label.description') }}" aria-describedby="descriptionHelp">{{ isset($restaurant) ? $restaurant->description : old('description') }}</textarea>
            @error('description')
                <div id="descriptionHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
            <div id="descriptionHelp" class="form-text">{{ __('label.description_help') }}</div>
        </div>

        {{-- image --}}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
