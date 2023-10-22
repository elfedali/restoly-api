@extends('layouts.app')
@section('title', __('label.restaurant'))
@section('content')
    {{-- restaurant new form --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h5>
                    {{ __('label.new_restaurant') }}
                </h5>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <form action="{{ route('admin.restaurant.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xlg-10 col-lg-9">

                    @include('admin.restaurant._form')
                    @include('admin.restaurant.widgets._menu')
                    @include('admin.restaurant.widgets._salles')
                    @include('admin.restaurant.widgets._images')
                    @include('admin.restaurant.widgets._links')
                    @include('admin.restaurant.widgets._phones')
                    @include('admin.restaurant._seo_form')
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-xlg-2 col-lg-3">
                    @include('admin.restaurant._widget_publish')
                    @include('admin.restaurant._widget_owner')
                    @include('admin.restaurant._widget_category')
                    @include('admin.restaurant._widget_service')
                    @include('admin.restaurant._widget_district')
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.container -->
@endsection
