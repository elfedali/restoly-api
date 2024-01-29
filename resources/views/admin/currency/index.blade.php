@extends('layouts.app')
@section('title', __('label.currencies'))
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="h4">{{ __('label.currencies') }}</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">{{ __('label.currencies') }}</li>
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
                        <form action="{{ route('admin.currency.store') }}" method="POST">
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
                            {{-- currency --}}
                            <div class="mb-3">
                                <label for="currency" class="form-label">{{ __('label.currency') }}</label>
                                <input type="text" class="form-control @error('currency') is-invalid @enderror"
                                    id="currency" name="currency" value="{{ old('currency') }}">
                                @error('currency')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('label.currency-help') }}</div>
                            </div>
                            {{-- symbol --}}
                            <div class="mb-3">
                                <label for="symbol" class="form-label">{{ __('label.symbol') }}</label>
                                <input type="text" class="form-control @error('symbol') is-invalid @enderror"
                                    id="symbol" name="symbol" value="{{ old('symbol') }}">
                                @error('symbol')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('label.symbol-help') }}</div>
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
                                @foreach ($currencies as $currency)
                                    <tr>
                                        <td>{{ $currency->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.currency.show', $currency) }}">
                                                {{ $currency->name }}
                                            </a>
                                        </td>
                                        <td>

                                            @if ($currency->is_active)
                                                <x-yes />
                                            @else
                                                <x-no />
                                            @endif
                                        <td>{{ $currency->slug }}</td>
                                        <td>

                                            <a class="btn btn-sm btn-primary me-2"
                                                href="{{ route('admin.currency.show', $currency) }}" role="button">
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
