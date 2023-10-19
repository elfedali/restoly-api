<div class="card">
    <div class="card-body">

        <h5>
            {{ __('label.districts') }}
        </h5>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('label.id') }}</th>
                    <th>{{ __('label.name') }}</th>
                    <th>{{ __('label.active') }}</th>
                    <th>{{ __('label.slug') }}</th>
                    {{-- <th>{{ __('label.actions') }}</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($city->districts as $district)
                    <tr>
                        <td>{{ $district->id }}</td>
                        <td>
                            <a href="#">
                                {{ $district->name }}
                            </a>
                        </td>
                        <td>

                            @if ($district->is_active)
                                <span class="badge bg-success">{{ __('label.yes') }}</span>
                            @else
                                <span class="badge bg-danger">{{ __('label.no') }}</span>
                            @endif
                        <td>{{ $district->slug }}</td>

                    </tr>
                @endforeach
        </table>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


{{-- add new disctrict to city --}}

<div class="card mt-4">
    <div class="card-body">
        <h5>
            {{ __('label.district') }}
        </h5>
        <form action="{{ route('admin.city.district.store', $city->id) }}" method="POST">
            @csrf
            <input type="hidden" name="city_id" value="{{ $city->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('label.name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">{{ __('label.name-help') }}</div>
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">{{ __('label.active') }}</label>
                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                    <option value="0" @if (old('is_active') == 0) selected @endif>
                        {{ __('label.no') }}</option>
                    <option value="1" @if (old('is_active') == 1) selected @endif>
                        {{ __('label.yes') }}</option>
                </select>
                @error('is_active')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">{{ __('label.is_it_active') }}</div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
        </form>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
