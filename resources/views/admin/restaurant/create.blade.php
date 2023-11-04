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
                <div class="col-xlg-12 col-lg-12">

                    @include('admin.restaurant.widgets.general')
                    @include('admin.restaurant.widgets.owner')
                    <div class="mt-4"></div>
                    @include('admin.restaurant.widgets.publish')
                </div>

            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.container -->
@endsection
