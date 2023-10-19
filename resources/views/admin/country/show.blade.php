@extends('layouts.app')

@section('title', __('label.country') . ' # ' . $country->id)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ __('label.country') }} #{{ $country->id }}</h5>
                        <table class="table table-striped ">

                            <tr>
                                <th>{{ __('label.id') }}</th>
                                <td>{{ $country->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.name') }}</th>
                                <td>{{ $country->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.slug') }}</th>
                                <td>{{ $country->slug }}</td>
                            <tr>
                                <th>{{ __('label.active') }}</th>
                                <td>
                                    @if ($country->is_active)
                                        <span class="badge bg-success">{{ __('label.yes') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('label.no') }}</span>
                                    @endif

                                    {{-- toggle is_active form --}}
                                    <form action="{{ route('admin.country.toggle', $country) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-light" title="{{ __('Toggle') }}"
                                            onclick="return confirm('{{ __('label.are-you-sure') }}')">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('label.created_at') }}</th>
                                <td>{{ $country->created_at }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.updated_at') }}</th>
                                <td>{{ $country->updated_at }}</td>
                            </tr>



                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                {{-- cancel btn go t index --}}
                <div class="mt-4">
                    <a href="{{ route('admin.country.index') }}" class="btn btn-light">

                        <i class="bi bi-arrow-left"></i>

                        {{ __('label.go-back') }}
                    </a>
                </div>
                {{-- edit btn go to edit --}}
            </div>
            <!-- /.col-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        {{-- edit  --}}
                        <h5>
                            {{ __('label.edit') }} #{{ $country->id }}
                        </h5>

                        <form action="{{ route('admin.country.update', $country) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('label.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $country->name }}"
                                    aria-describedby="nameHelp">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="nameHelp" class="form-text">{{ __('label.name-help') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">{{ __('label.slug') }}</label>
                                <input type="text" name="slug" id="slug"
                                    class="form-control @error('slug') is-invalid @enderror" value="{{ $country->slug }}"
                                    aria-describedby="slugHelp">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="slugHelp" class="form-text">{{ __('label.slug-help') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="is_active" class="form-label">{{ __('label.active') }}</label>
                                <select name="is_active" id="is_active"
                                    class="form-select @error('is_active') is-invalid @enderror"
                                    aria-describedby="is_activeHelp">
                                    <option value="0" @if (!$country->is_active) selected @endif>
                                        {{ __('label.no') }}</option>
                                    <option value="1" @if ($country->is_active) selected @endif>
                                        {{ __('label.yes') }}</option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('label.is_it_active') }}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">{{ __('label.edit') }}</button>
                                <a href="{{ route('admin.country.index') }}" class="btn btn-light">
                                    {{ __('label.cancel') }}
                                </a>
                            </div>
                            <!-- /.d-flex -->

                        </form>
                        <hr>
                        {{-- delete --}}
                        <div class="text-end">
                            <form action="{{ route('admin.country.destroy', $country) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('{{ __('Are you sure?') }}')">
                                    <i class="bi bi-trash"></i>
                                    {{ __('label.delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
