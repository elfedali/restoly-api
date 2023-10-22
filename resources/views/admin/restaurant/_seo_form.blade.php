{{-- meta_title , meta_description, meta_keywords --}}
<div class="card mt-4">
    <div class="card-header">
        <h5>{{ __('label.seo') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        <div class="mb-3">
            <label for="meta_title" class="form-label">{{ __('label.meta_title') }}</label>
            <input type="text" name="meta_title" id="meta_title"
                class="form-control @error('meta_title') is-invalid @enderror"
                value="{{ isset($restaurant) ? $restaurant->meta_title : old('meta_title') }}"
                placeholder="{{ __('label.meta_title') }}" aria-describedby="meta_titleHelp">
            @error('meta_title')
                <div id="meta_titleHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
            <div id="meta_titleHelp" class="form-text">{{ __('label.meta_title_help') }}</div>
        </div>

        <div class="mb-3">
            <label for="meta_description" class="form-label">{{ __('label.meta_description') }}</label>
            <textarea name="meta_description" id="meta_description"
                class="form-control @error('meta_description') is-invalid @enderror" rows="3"
                placeholder="{{ __('label.meta_description') }}" aria-describedby="meta_descriptionHelp">{{ isset($restaurant) ? $restaurant->meta_description : old('meta_description') }}</textarea>
            @error('meta_description')
                <div id="meta_descriptionHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
            <div id="meta_descriptionHelp" class="form-text">{{ __('label.meta_description_help') }}</div>
        </div>

        <div class="mb-3">
            <label for="meta_keywords" class="form-label">{{ __('label.meta_keywords') }}</label>
            <textarea name="meta_keywords" id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror"
                rows="3" placeholder="{{ __('label.meta_keywords') }}" aria-describedby="meta_keywordsHelp">{{ isset($restaurant) ? $restaurant->meta_keywords : old('meta_keywords') }}</textarea>
            @error('meta_keywords')
                <div id="meta_keywordsHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
            <div id="meta_keywordsHelp" class="form-text">{{ __('label.meta_keywords_help') }}</div>
        </div>


    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
