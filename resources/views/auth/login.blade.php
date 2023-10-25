@extends('layouts.auth')

@section('content')
    <div class="auth">
        <div class="container">
            <div class="row">
                {{-- vh-100 --}}
                <div class="col-xl-4 col-lg-4 col-md-8 vh-100 mx-auto">
                    <div class="form-auth-wrapper">
                        {{-- include top --}}
                        @include('auth._top', ['title' => 'auth.welcome-back'])
                        {{-- include login --}}
                        @include('auth._login')
                    </div>
                    <!-- /.form-auth-wrapper -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /.auth -->
@endsection
