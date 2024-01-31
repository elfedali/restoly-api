@extends('layouts.app')
@section('title', __('label.restaurant'))
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

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
                <h1>Images</h1>
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.restaurant.image.store', $restaurant->id) }}" method="POST"
                            enctype="multipart/form-data" class="dropzone" id="myUploader">
                            @csrf
                        </form>
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.col-12 -->
                <div class="row">
                    @foreach ($restaurant->images as $image)
                        <div class="col-1 mt-1">
                            <div
                                class="bg-white p-2 h-100 rounded d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset($image->path()) }}" alt="{{ $image->name }}"
                                    id="media-{{ $image->id }}" class="img-fluid rounded mb-2" />

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
            <!-- /.row -->
        </div>
        <!-- /.container -->
    @endsection
    @section('scripts')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script>
            let myUploader = new Dropzone("#myUploader", {
                thumbnailWidth: 150,
                thumbnailHeight: 150,
                maxFilesize: 3,
                parallelUploads: 1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                success: function(file, response) {
                    console.log(response);
                    // let imgName = response;
                    // file.previewElement.classList.add("dz-success");
                    // console.log("Successfully uploaded :" + imgName);
                },
                error: function(file, response) {
                    // file.previewElement.classList.add("dz-error");
                    console.log(response);
                },

            });
        </script>

    @endsection
