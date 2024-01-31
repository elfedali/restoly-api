@extends('layouts.app')
@section('title', __('label.restaurant'))
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-admin.title title="{{ __('label.images') }}">
                    {{-- <x-btns.create route="admin.restaurant.create" /> --}}
                </x-admin.title>
            </div>
            <!-- /.col-12 -->

        </div>
        <!-- /.row -->

        <div class="row">
            @foreach ($images as $image)
                <div class="col-1">
                    <div class="bg-white p-2 h-100 rounded d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset($image->path()) }}" alt="{{ $image->name }}" id="media-{{ $image->id }}"
                            class="img-fluid rounded mb-2" />

                    </div>
                    <div class="py-3">
                        <div>ID : {{ $image->id }}</div>
                        <div>{{ $image->name }}</div>
                    </div>
                    <!-- /.bg-light -->
                </div>
                <!-- /.col-3 -->
            @endforeach
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
