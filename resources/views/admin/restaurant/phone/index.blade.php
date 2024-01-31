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
                <div class="card mb-3 mt-3">
                    <div class="card-body">
                        <form action="{{ route('admin.restaurant.phone.store', $restaurant->id) }}" method="POST">
                            @csrf
                            {{-- phone --}}
                            <div class="mb-3">
                                <label for="phone">{{ __('label.phone') }}</label>
                                <input type="text" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                    placeholder="{{ __('label.phone') }}" aria-describedby="helpId" />
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- /.form-group -->
                            <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('label.phone') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurant->phones as $phone)
                                    <tr>
                                        <td>

                                            <div class="card my-4">
                                                <div class="card-body">
                                                    <div class="text-end">
                                                        <form
                                                            action="{{ route('admin.restaurant.phone.destroy', [$restaurant->id, $phone->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash"></i>
                                                                {{ __('label.delete') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.restaurant.phone.update', [$restaurant->id, $phone->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- phone --}}
                                                        <div class="mb-3">
                                                            <label for="phone_edit">{{ __('label.phone') }}</label>
                                                            <input type="text" name="phone_edit" id="phone_edit"
                                                                class="form-control @error('phone_edit') is-invalid @enderror"
                                                                value="{{ $phone->phone }}"
                                                                placeholder="{{ __('label.phone') }}"
                                                                aria-describedby="helpId" />
                                                            @error('phone_edit')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- /.mb-3 -->
                                                        {{-- checkbox:is_active  --}}
                                                        <div class="mb-3">
                                                            <input type="checkbox" name="is_active" id="is_active"
                                                                class="form-check-input me-2 @error('is_active') is-invalid @enderror"
                                                                value="{{ $phone->is_active }}"
                                                                placeholder="{{ __('label.is_active') }}"
                                                                aria-describedby="helpId"
                                                                {{ $phone->is_active ? 'checked' : '' }} />
                                                            <label for="is_active">{{ __('label.is_active') }}</label>
                                                            @error('is_active')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        {{-- checkbox:is_main --}}
                                                        <div class="mb-3">
                                                            <input type="checkbox" name="is_main" id="is_main"
                                                                class="form-check-input me-2 @error('is_main') is-invalid @enderror"
                                                                value="{{ $phone->is_main }}"
                                                                placeholder="{{ __('label.is_main') }}"
                                                                aria-describedby="helpId"
                                                                {{ $phone->is_main ? 'checked' : '' }} />
                                                            <label for="is_main">{{ __('label.is_main') }}</label>
                                                            @error('is_main')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- /.mb-3 -->
                                                        {{-- weight --}}
                                                        <div class="mb-3">
                                                            <label for="weight">{{ __('label.weight') }}</label>
                                                            <input type="number" name="weight" id="weight"
                                                                class="form-control @error('weight') is-invalid @enderror"
                                                                value="{{ $phone->weight }}" aria-describedby="helpId" />
                                                            @error('weight')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- /.mb-3 -->

                                                        {{-- button:submit --}}
                                                        <div class="text-end">
                                                            <button type="submit" class="btn  btn-sm btn-primary">
                                                                {{ __('label.update') }}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->

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
    <!-- /.container -->
@endsection
