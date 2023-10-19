@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.country.index') }}">
                                {{ __('label.countries') }}</a>
                        </li>

                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.country.show', $country->id) }}">{{ $country->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $city->name }}</li>
                    </ol>
                </nav>

            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                @include('admin.country.city._city_show', ['city' => $city])

            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                @include('admin.country.city._city_district', ['city' => $city])
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
