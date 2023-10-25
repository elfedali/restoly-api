@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                     @include('admin.dashboard._stats')

            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">  


            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fuild -->
@endsection
