@extends('layouts.app')
@section('title', __('label.users'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h4">{{ __('label.users') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">{{ __('label.users') }}</li>
                    </ol>
                </nav>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-4">
                @include('admin.user._create_form')
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-8">
                @include('admin.user._table')
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
