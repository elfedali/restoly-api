@extends('layouts.app')
@section('title', __('label.users'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h4">
                    {{ __('label.create') }}
                    {{ __('label.user') }}
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('admin.user.index') }}">
                                {{ __('label.users') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('label.create') }}</li>
                    </ol>
                </nav>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

                @include('admin.user.inc.form_create')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
