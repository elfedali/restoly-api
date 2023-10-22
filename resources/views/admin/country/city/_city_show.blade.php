<div class="card">
    <div class="card-body">
        <h5>
            {{ __('label.city') }} #{{ $city->id }}
        </h5>
        <table class="table table-striped">
            <tr>
                <th> {{ __('label.id') }} </th>
                <td> {{ $city->id }} </td>
            </tr>
            <tr>
                <th> {{ __('label.name') }} </th>
                <td> {{ $city->name }} </td>
            </tr>

            <tr>
                <th> {{ __('label.slug') }} </th>
                <td> {{ $city->slug }} </td>
            </tr>
            <tr>
                <th> {{ __('label.country') }} </th>
                <td> {{ $city->country->name }} </td>
            </tr>
            <tr>
                <td> {{ __('label.active') }} </td>
                <td>
                    @if ($city->is_active)
                        <span class="badge bg-success">{{ __('label.yes') }}</span>
                    @else
                        <span class="badge bg-danger">{{ __('label.no') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th> {{ __('label.created_at') }} </th>
                <td> {{ $city->created_at }} </td>
            </tr>
            <tr>
                <th> {{ __('label.updated_at') }} </th>
                <td> {{ $city->updated_at }} </td>
            </tr>

        </table>


    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


{{-- edit city  form --}}

<div class="card mt-4">
    <div class="card-body">
        <h5>
            {{ __('label.edit') }} #{{ $city->id }}
        </h5>

        <form action="{{ route('admin.country.city.update', [$city->country, $city]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('label.name') }}</label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ $city->name }}"
                    aria-describedby="nameHelp">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="nameHelp" class="form-text">{{ __('label.name-help') }}</div>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">{{ __('label.slug') }}</label>
                <input type="text" name="slug" id="slug"
                    class="form-control @error('slug') is-invalid @enderror" value="{{ $city->slug }}"
                    aria-describedby="slugHelp">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="slugHelp" class="form-text">{{ __('label.slug-help') }}</div>
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">{{ __('label.active') }}</label>
                <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror"
                    aria-describedby="is_activeHelp">
                    <option value="0" @if (!$city->is_active) selected @endif>
                        {{ __('label.no') }}</option>
                    <option value="1" @if ($city->is_active) selected @endif>
                        {{ __('label.yes') }}</option>
                </select>
                @error('is_active')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">{{ __('label.is_it_active') }}</div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('label.update') }}</button>
        </form>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
