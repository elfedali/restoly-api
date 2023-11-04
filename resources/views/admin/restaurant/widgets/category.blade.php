<div class="card mt-4">
    <div class="card-header">
        <h5>{{ __('label.categories') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- category checkboxes --}}
        @php
            $categories = App\Models\Category::all();
        @endphp

        @foreach ($categories as $category)
            <div class="mb-3">
                <input type="checkbox" name="categories[]" id="category_{{ $category->id }}" value="{{ $category->id }}"
                    class="form-check-input @error('categories') is-invalid @enderror"
                    @if (isset($restaurant) && $restaurant->categories->contains($category->id)) checked @endif>
                <label for="category_{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
                @error('categories')
                    <div id="categoriesHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>
            <!-- /.mb-3 -->
        @endforeach
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
