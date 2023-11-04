@extends('layouts.app')
@section('title', __('label.restaurants'))

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-3">
                    {{-- title --}}
                    <h1 class="h4">
                        {{ __('label.restaurants') }}
                    </h1>
                    {{-- create new restaurant --}}
                    <a class="mx-3 btn btn-sm btn-outline-primary" href="{{ route('admin.restaurant.create') }}">
                        <i class="bi bi-plus-circle me-1"></i>
                        {{ __('label.create') }}
                    </a>

                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">{{ __('label.restaurants') }}</li>
                    </ol>
                </nav>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">{{ __('label.id') }}</th>
                                    <th>{{ __('label.name') }}</th>
                                    <th>{{ __('label.owner') }}</th>
                                    <th>{{ __('label.active') }}</th>
                                    <th>{{ __('label.created_at') }}</th>
                                    {{-- <th>{{ __('label.updated_at') }}</th> --}}
                                    <th class="text-end">{{ __('label.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $restaurant->id }}</td>
                                        <td>
                                            <div>{{ $restaurant->name }}</div>
                                            <div>
                                                <small><small>{{ $restaurant->slug }}</small></small>
                                            </div>
                                        </td>

                                        <td>{{ $restaurant->owner->fullName() }}</td>
                                        <td>
                                            @if ($restaurant->is_active)
                                                <span class="badge bg-success">{{ __('label.yes') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('label.no') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $restaurant->created_at }}</td>
                                        {{-- <td>{{ $restaurant->updated_at }}</td> --}}
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                {{-- edit btn --}}
                                                <a href="{{ route('admin.restaurant.edit', $restaurant) }}"
                                                    class="btn btn-sm btn-primary me-2">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                {{-- delete btn --}}
                                                <form action="{{ route('admin.restaurant.destroy', $restaurant) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
