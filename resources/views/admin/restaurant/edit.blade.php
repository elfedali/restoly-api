@extends('layouts.app')
@section('title', __('label.restaurant'))
@section('content')
    {{-- restaurant new form --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3">
                    {{ __('label.edit') }} {{ __('label.restaurant') }} <u>#{{ $restaurant->name }}</u>
                    {{ __('label.of') }} #{{ $restaurant->owner->id }}
                    <u>{{ $restaurant->owner->fullName() }}</u>
                </h1>
            </div>
            <!-- /.col-12 -->
        </div>
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general-tab-pane"
                        type="button" role="tab" aria-controls="general-tab-pane" aria-selected="true">
                        @lang('label.general')
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu-tab-pane"
                        type="button" role="tab" aria-controls="menu-tab-pane" aria-selected="false">
                        @lang('label.menu')
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane"
                        type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">
                        @lang('label.reviews')
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos-tab-pane"
                        type="button" role="tab" aria-controls="photos-tab-pane" aria-selected="false">
                        @lang('label.photos')
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="phones-tab" data-bs-toggle="tab" data-bs-target="#phones-tab-pane"
                        type="button" role="tab" aria-controls="phones-tab-pane" aria-selected="false">
                        @lang('label.phones')
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general-tab-pane" role="tabpanel" aria-labelledby="general-tab"
                    tabindex="0">

                    <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                            <div class="col-xlg-10 col-lg-9">

                                @include('admin.restaurant.widgets.general', ['restaurant' => $restaurant])
                                {{-- @include('admin.restaurant.widgets._salles', ['restaurant' => $restaurant]) --}}
                                {{-- @include('admin.restaurant.widgets._images', ['restaurant' => $restaurant]) --}}
                                {{-- @include('admin.restaurant.widgets._links', ['restaurant' => $restaurant]) --}}
                                {{-- @include('admin.restaurant.widgets._phones', ['restaurant' => $restaurant]) --}}
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
                <div class="tab-pane fade" id="menu-tab-pane" role="tabpanel" aria-labelledby="menu-tab" tabindex="0">
                    <menu-component :id="{{ $restaurant->id }}"></menu-component>
                </div>
                <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    reviews
                </div>
                <div class="tab-pane fade" id="photos-tab-pane" role="tabpanel" aria-labelledby="photos-tab" tabindex="0">
                    <upload-images-component :id="{{ $restaurant->id }}"></upload-images-component>
                </div>
                <div class="tab-pane fade" id="phones-tab-pane" role="tabpanel" aria-labelledby="phones-tab" tabindex="0">
                    <phone-component :id="{{ $restaurant->id }}"></phone-component>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
