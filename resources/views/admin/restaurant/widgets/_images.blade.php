<div class="card mt-4">
    <div class="card-header">
        <h5> {{ __('label.images') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        @if (isset($restaurant) && $restaurant->images->count() > 0)
            <div class="row">
                @foreach ($restaurant->images as $image)
                    <div class="col-lg-2">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $restaurant->name }}"
                            class="img-fluid mb-2 rounded">
                    </div>
                    <!-- /.col-md-3 -->
                @endforeach
            </div>
            <!-- /.row -->
        @endif
        {{-- images[] --}}
        <div class="mb-3">
            <label for="images" class="form-label">{{ __('label.images') }}</label>
            <input type="file" name="images[]" id="images"
                class="form-control @error('images') is-invalid @enderror" multiple aria-describedby="imagesHelp"
                accept="image/*">
            @error('images')
                <div id="imagesHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
            <div id="imagesHelp" class="form-text">{{ __('label.images_help') }}</div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card mt-4 -->
