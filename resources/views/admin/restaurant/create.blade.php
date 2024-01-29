@extends('layouts.app')
@section('title', __('label.restaurant'))
@section('content')
    {{-- restaurant new form --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-admin.title title="{{ __('label.new_restaurant') }}">
                    {{-- <x-btns.create route="admin.restaurant.create" /> --}}
                </x-admin.title>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <form action="{{ route('admin.restaurant.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    @include('admin.restaurant.widgets.general')
                    @include('admin.restaurant.widgets.owner')
                    @include('admin.restaurant._seo_form', ['restaurant' => null])

                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-3">
                    {{-- @include('admin.restaurant.widgets.location')
                    @include('admin.restaurant.widgets.media')
                    @include('admin.restaurant.widgets.opening_hours')
                    @include('admin.restaurant.widgets.payment_methods')
                    @include('admin.restaurant.widgets.delivery')
                    @include('admin.restaurant.widgets.submit') --}}
                    @include('admin.restaurant.widgets.publish')
                    @include('admin.restaurant.widgets.category', [
                        'restaurant' => null,
                    ])
                    @include('admin.restaurant.widgets.service', ['restaurant' => null])
                </div>

            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.container -->
@endsection
