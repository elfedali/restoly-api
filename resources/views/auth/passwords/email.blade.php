@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 vh-100">
                <div class="form-auth-wrapper">
                    {{-- include _top --}}
                    @include('auth._top', ['title' => 'auth.reset'])
                    {{-- include _reset --}}
                    @include('auth.passwords._email')
                </div>
                <!-- /.form-auth-wrapper -->
            </div>
            <!-- /.col-lg-4 vh-100 -->
            <div class="col-lg-8 bg-auth-email">
                {{-- empty --}}
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
