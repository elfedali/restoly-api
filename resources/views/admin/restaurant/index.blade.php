@extends('layouts.app')
@section('title', __('label.restaurants'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-admin.title title="{{ __('label.restaurants') }}">
                    <x-btns.create route="admin.restaurant.create" />
                </x-admin.title>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-12">
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

                <div class="card rounded-0">
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">{{ __('label.id') }}</th>
                                    <th><i class="fa-solid fa-shop me-1"></i>{{ __('label.name') }}</th>
                                    <th> <i class="fa-solid fa-key me-1"></i> {{ __('label.owner') }}</th>
                                    <th>{{ __('label.active') }}</th>
                                    <th>{{ __('label.created_at') }}</th>
                                    <th class="text-end">{{ __('label.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $restaurant->id }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('admin.restaurant.edit', $restaurant) }}">
                                                    <strong> {{ $restaurant->name }}</strong>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.show', $restaurant->owner) }}">
                                                {{ $restaurant->owner->fullName() }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($restaurant->is_active)
                                                <x-yes />
                                            @else
                                                <x-no />
                                            @endif
                                        </td>

                                        <td>{{ $restaurant->created_at->diffForHumans() }}</td>

                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <div class="dropdown me-2">
                                                    <button class="btn btn-sm btn-outline-secondary _dropdown-toggle"
                                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        {{ __('label.more') }}
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.restaurant.menu.index', $restaurant) }}">
                                                                <i class="fas fa-utensils me-1"></i>
                                                                {{ __('label.menu') }}
                                                            </a>
                                                        </li>
                                                        {{-- review --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.restaurant.review.index', $restaurant) }}">
                                                                <i class="fas fa-star-half-alt me-1"></i>
                                                                {{ __('label.reviews') }}
                                                            </a>
                                                        </li>
                                                        {{-- image --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.restaurant.image.index', $restaurant) }}">
                                                                <i class="fas fa-images me-1"></i>
                                                                {{ __('label.images') }}
                                                            </a>
                                                        </li>
                                                        {{-- address --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.restaurant.address.index', $restaurant) }}">
                                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                                {{ __('label.address') }}
                                                            </a>
                                                        </li>
                                                        {{-- link --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.restaurant.link.index', $restaurant) }}">
                                                                <i class="fas fa-link me-1"></i>
                                                                {{ __('label.links') }}
                                                            </a>
                                                        </li>
                                                        {{-- opening hours --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.restaurant.openingHour.index', $restaurant) }}">
                                                                <i class="fas fa-clock me-1"></i>
                                                                {{ __('label.opening_hours') }}
                                                            </a>
                                                        </li>
                                                        {{-- reservation --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.restaurant.reservation.index', $restaurant) }}">
                                                                <i class="fas fa-calendar-check me-1"></i>
                                                                {{ __('label.reservations') }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div> {{-- edit btn --}}
                                                <a href="{{ route('admin.restaurant.edit', $restaurant) }}"
                                                    class="btn btn-sm btn-secondary me-2">
                                                    <i class="fas fa-edit me-1"></i>
                                                    {{ __('label.edit') }}
                                                </a>
                                                {{-- delete btn --}}
                                                <form action="{{ route('admin.restaurant.destroy', $restaurant) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger me-2"
                                                        onclick="return confirm('{{ __('label.are-you-sure') }}')">
                                                        <i class="fas fa-trash-alt me-1"></i>
                                                        {{ __('label.delete') }}
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
