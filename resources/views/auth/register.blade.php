@extends('layouts.auth')

@section('content')
    <div class="auth">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 vh-100 bg-white">
                    <div class="form-auth-wrapper">
                        {{-- include _top --}}
                        @include('auth._top', ['title' => 'auth.new_account'])

                        {{-- include _register --}}
                        @include('auth._register')
                    </div>
                    <!-- /.form-auth-wrapper -->
                </div>
                <!-- /.col-lg-5 -->
                <div class="col-lg-7 bg-auth-register">
                    {{-- empty --}}
                </div>
                <!-- /.col-lg-7 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.auth -->
@endsection
