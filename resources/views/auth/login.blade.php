@extends('layouts.auth')

@section('content')
    <div class="auth">
        <div class="container-fluid">
            <div class="row">
                {{-- vh-100 --}}
                <div class="col-lg-4 vh-100 bg-white">
                    <div class="form-auth-wrapper">
                        {{-- include top --}}
                        @include('auth._top', ['title' => 'auth.welcome-back'])
                        {{-- include login --}}
                        @include('auth._login')
                    </div>
                    <!-- /.form-auth-wrapper -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-8 bg-auth-login">
                    {{-- empty --}}
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /.auth -->
@endsection
