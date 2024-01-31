@extends('layouts.app')
@section('title', __('label.restaurant'))
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
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ route('admin.restaurant.link.store', $restaurant->id) }}" method="POST">
                            @csrf
                            {{-- name --}}
                            <div class="mb-3">
                                <label for="name">{{ __('label.name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{-- help: facebook,twitter,instagram,website,tiktok,youtube --}}
                                <div class="form-text">
                                    {{ __('label.help_social') }} |
                                    {{ __('label.list_social') }}
                                </div>
                            </div>
                            {{-- url --}}
                            <div class="mb-3">
                                <label for="url">{{ __('label.url') }}</label>
                                <input type="text" name="url" id="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url', $restaurant->url) }}">
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- checkbox:is_active --}}
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="is_active" id="is_active"
                                    class="form-check-input @error('is_active') is-invalid @enderror"
                                    {{ old('is_active') ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">{{ __('label.is_active') }}</label>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- submit --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('label.name') }}</th>
                                    <th>{{ __('label.url') }}</th>
                                    <th>{{ __('label.is_active') }}</th>
                                    <th>{{ __('label.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurant->links as $link)
                                    <tr>
                                        <td>{{ $link->name }}</td>
                                        <td>{{ $link->url }}</td>
                                        <td>
                                            @if ($link->is_active)
                                                <x-yes />
                                            @else
                                                <x-no />
                                            @endif
                                        </td>
                                        <td>
                                            vide
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
