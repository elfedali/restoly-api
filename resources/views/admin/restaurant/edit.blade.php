@extends('layouts.app')
@section('title', __('label.restaurant'))
@section('content')
    {{-- restaurant new form --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h5>
                    {{ __('label.edit') }} #{{ $restaurant->id }}
                </h5>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xlg-10 col-lg-9">

                    @include('admin.restaurant.widgets.general', ['restaurant' => $restaurant])
                    {{-- @include('admin.restaurant.widgets._salles', ['restaurant' => $restaurant]) --}}
                    {{-- @include('admin.restaurant.widgets._images', ['restaurant' => $restaurant]) --}}
                    {{-- @include('admin.restaurant.widgets._links', ['restaurant' => $restaurant]) --}}
                    {{-- @include('admin.restaurant.widgets._phones', ['restaurant' => $restaurant]) --}}
                    @include('admin.restaurant._seo_form', ['restaurant' => $restaurant])
                    <upload-images-component :id="{{ $restaurant->id }}"></upload-images-component>
                    <menu-component :id="{{ $restaurant->id }}"></menu-component>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-xlg-2 col-lg-3">
                    @include('admin.restaurant.widgets.publish', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets.owner', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets.category', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets.service', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets.district', ['restaurant' => $restaurant])
                    <phone-component :id="{{ $restaurant->id }}"></phone-component>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.container -->
@endsection
