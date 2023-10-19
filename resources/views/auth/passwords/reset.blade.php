@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-auth-wrapper">
                    {{-- include _top --}}
                    @include('auth._top', ['title' => 'auth.reset_password'])

                    {{-- include _reset --}}
                    {{-- include _reset --}}
                    @include('auth.passwords._reset')
                </div>
                <!-- /.form-auth-wrapper -->
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-8"></div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
