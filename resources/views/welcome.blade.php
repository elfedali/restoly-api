@extends('layouts.public')

@section('title', __('label.home'))

@section('content')
    {{-- home --}}
    <div class="container py-5">
        <p class="h1 text-primary"> {{ config('app.name', 'Laravel') }}</p>

        <h1>
            @lang('label.welcome-message')

        </h1>
        <p class="text-muted">
            @lang('label.login-message')
        </p>

        <a href="{{ route('login') }}" class="btn btn-primary">
            @lang('label.login')
        </a>
    </div>
    <!-- /.home -->
@endsection
