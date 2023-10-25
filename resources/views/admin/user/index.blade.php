@extends('layouts.app')
@section('title', __('label.users'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-4">
                
                <h1 class="h4">{{ __('label.users') }}</h1>
                    <a class="mx-3 btn btn-sm btn-outline-primary" href="{{ route('admin.user.create') }}"
                        role="button">
                        <i class="bi bi-plus-circle"></i>
                        {{ __('label.create') }}
                    </a>
                        
                </div>
               
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
            <div class="col-lg-12">
                @include('admin.user._user_filter')
                @include('admin.user._table')
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
