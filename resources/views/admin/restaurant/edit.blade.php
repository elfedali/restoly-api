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

                    @include('admin.restaurant._form', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets._menu', ['restaurant' => $restaurant])
                    <menu-component :id="{{ $restaurant->id }}"></menu-component>
                    @include('admin.restaurant.widgets._salles', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets._images', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets._links', ['restaurant' => $restaurant])
                    @include('admin.restaurant.widgets._phones', ['restaurant' => $restaurant])
                    @include('admin.restaurant._seo_form', ['restaurant' => $restaurant])
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-xlg-2 col-lg-3">
                    @include('admin.restaurant._widget_publish', ['restaurant' => $restaurant])
                    @include('admin.restaurant._widget_owner', ['restaurant' => $restaurant])
                    @include('admin.restaurant._widget_category', ['restaurant' => $restaurant])
                    @include('admin.restaurant._widget_service', ['restaurant' => $restaurant])
                    @include('admin.restaurant._widget_district', ['restaurant' => $restaurant])
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.container -->
@endsection
