{{-- list of country cities --}}
<div class="card">
    <div class="card-body">
        <h5>
            {{ __('label.cities') }}
        </h5>
        {{-- {{ $cities }} --}}
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ __('label.id') }}</th>
                    <th>{{ __('label.name') }}</th>
                    <th>{{ __('label.slug') }}</th>
                    <th>{{ __('label.created_at') }}</th>
                    <th>{{ __('label.updated_at') }}</th>
                    {{-- <th>{{ __('label.actions') }}</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>
                            <a href="{{ route('admin.country.city.show', [$city->country, $city]) }}">
                                {{ $city->id }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.country.city.show', [$city->country, $city]) }}">
                                {{ $city->name }}
                            </a>
                        </td>
                        <td>{{ $city->slug }}</td>
                        <td>{{ $city->created_at }}</td>
                        <td>{{ $city->updated_at }}</td>
                        {{-- <td>
                            <div class="d-flex">
                               
                                <a href="{{ route('admin.country.city.show', [$city->country, $city]) }}"
                                    class="btn btn-sm btn-primary me-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


{{-- new city --}}

<div class="card mt-4">
    <div class="card-body">
        <h5>
            {{ __('label.new-city') }}
        </h5>
        <form action="{{ route('admin.country.city.store', $country) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('label.name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">{{ __('label.active') }}</label>
                <select class="form-select" id="is_active" name="is_active">
                    <option value="1" selected>{{ __('label.yes') }}</option>
                    <option value="0">{{ __('label.no') }}</option>
                </select>
            </div>

            {{-- hidden country_id --}}
            <input type="hidden" name="country_id" value="{{ $country->id }}">
            <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
