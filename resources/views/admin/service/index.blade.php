@extends('layouts.app')
@section('title', __('label.services'))
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="h4">{{ __('label.services') }}</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">{{ __('label.services') }}</li>
                    </ol>
                </nav>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5>
                            {{ __('label.create') }}
                        </h5>
                        <form action="{{ route('admin.service.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('label.name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('label.name-help') }}</div>
                            </div>

                            {{-- is_active --}}
                            <div class="mb-3">
                                <label for="is_active" class="form-label">{{ __('label.active') }}</label>
                                <select class="form-select @error('is_active') is-invalid @enderror" id="is_active"
                                    name="is_active">
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
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5>
                            {{ __('label.list') }}
                        </h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('label.id') }}</th>
                                    <th>{{ __('label.name') }}</th>
                                    <th>{{ __('label.active') }}</th>
                                    <th>{{ __('label.slug') }}</th>
                                    <th>{{ __('label.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.service.show', $service) }}">
                                                {{ $service->name }}
                                            </a>
                                        </td>
                                        <td>

                                            @if ($service->is_active)
                                                <span class="badge bg-success">{{ __('label.yes') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('label.no') }}</span>
                                            @endif
                                        <td>{{ $service->slug }}</td>
                                        <td>

                                            <a class="btn btn-sm btn-primary me-2"
                                                href="{{ route('admin.service.show', $service) }}" role="button">
                                                <i class="bi bi-eye"></i>
                                                {{ __('label.show') }}
                                            </a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
