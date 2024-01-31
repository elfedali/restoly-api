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
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>{{ __('label.add_new_menu_section') }}</h5>
                        <form action="{{ route('admin.restaurant.menu.storeMenuCategory', $restaurant->id) }}"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="menu-category" class="form-label">{{ __('label.menu_section_name') }}</label>
                                <input name="name" type="text" class="form-control" id="menu-category"
                                    placeholder="{{ __('label.menu_section_name') }}">
                            </div>
                            <div class="text-end">
                                {{-- submit --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    {{ __('label.create') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.cardbody -->
                </div>
                <!-- /.card -->
            </div>
            @if (isset($restaurant->menu) && $restaurant->menu->menuCategories->count() > 0)
                <div class="col-12">
                    <table class="table mt-4 table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('label.menu_section_name') }}</th>
                                <th>{{ __('label.menu_section_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurant->menu->menuCategories as $menuCategory)
                                <tr>
                                    <td>
                                        <strong><span
                                                class="bg-dark text-light p-1 rounded me-2">{{ $menuCategory->name }}</span>
                                            <i class="fas fa-chevron-right"></i></strong>
                                        {{ $menuCategory->menuItems->count() }}
                                        {{ __('label.menu_items') }}
                                    </td>
                                    <td>

                                        <div class="d-flex">
                                            <form
                                                action="{{ route('admin.restaurant.menu.destroyMenuCategory', [$restaurant->id, $menuCategory->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger me-2"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                    {{ __('label.delete') }}
                                                </button>
                                            </form>
                                            {{-- add menu item --}}
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#menu-item-{{ $menuCategory->id }}">
                                                <i class="fas fa-plus-circle"></i>
                                                {{ __('label.add_menu_item') }}
                                            </button>


                                        </div>
                                        <!-- /.d-flex -->
                                        @include('admin.restaurant.menu.menu-item.modal', [
                                            'menuCategory' => $menuCategory,
                                        ])

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">

                                        @include('admin.restaurant.menu.menu-item.card', [
                                            'menuCategory' => $menuCategory,
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
                <!-- /.col-12 -->

            @endif



        </div>
        <!-- /.row -->




    </div>
    <!-- /.container -->




@endsection
