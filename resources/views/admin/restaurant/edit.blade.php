@extends('layouts.app')
@section('title', __('label.restaurant'))
@section('content')
    {{-- restaurant new form --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-admin.title title="{{ __('label.edit_restaurant') }}">
                    <x-btns.create route="admin.restaurant.create" />
                </x-admin.title>
            </div>
            <!-- /.col-12 -->
        </div>

        <div class="row">
            <div class="col-12">
                @include('admin.restaurant.widgets.nav')
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-4">
                        <div class="col-xlg-10 col-lg-9">
                            @include('admin.restaurant.widgets.general', ['restaurant' => $restaurant])
                            @include('admin.restaurant._seo_form', ['restaurant' => $restaurant])
                        </div>
                        <!-- /.col-lg-8 -->
                        <div class="col-xlg-2 col-lg-3">
                            @include('admin.restaurant.widgets.publish', ['restaurant' => $restaurant])
                            @include('admin.restaurant.widgets.owner', ['restaurant' => $restaurant])
                            @include('admin.restaurant.widgets.category', [
                                'restaurant' => $restaurant,
                            ])
                            @include('admin.restaurant.widgets.service', ['restaurant' => $restaurant])
                            @include('admin.restaurant.widgets.district', [
                                'restaurant' => $restaurant,
                            ])

                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
