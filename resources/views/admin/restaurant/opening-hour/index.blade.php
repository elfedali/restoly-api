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

                        <div class="row">
                            <div class="col-12">

                                <input type="time" id="default_open_time">
                                <input type="time" id="default_close_time">
                                <button type="button" id="btn-default-time" class="btn btn-sm btn-dark ms-2">Apply</button>

                            </div>
                        </div>
                        <!-- /.col-12 -->
                        <form action="{{ route('admin.restaurant.openingHour.update', $restaurant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('label.day') }}</th>
                                        <th>{{ __('label.status') }}</th>
                                        <th>{{ __('label.open_time') }}</th>
                                        <th>{{ __('label.close_time') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($days as $day)
                                        <tr>
                                            <td>{{ __('label.days.' . $day) }}</td>
                                            <td>
                                                <input type="checkbox" name="days[{{ $day }}][is_open]"
                                                    id="is_open_{{ $day }}" checked class="me-2" value="1">
                                                <label for="is_open_{{ $day }}">
                                                    {{ __('label.is_open') }}
                                                </label>
                                                {{-- error --}}
                                                @error('days.' . $day . '.is_open')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" name="days[{{ $day }}][open_time]"
                                                    id="open_time_{{ $day }}" required class="open_time_field"
                                                    value="09:00">
                                                {{-- error --}}
                                                @error('days.' . $day . '.open_time')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" name="days[{{ $day }}][close_time]"
                                                    id="close_time_{{ $day }}" required class="close_time_field"
                                                    value="21:00">
                                                {{-- error --}}
                                                @error('days.' . $day . '.close_time')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>

                        </form>

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

@section('scripts')
    <script>
        var $defautl_open_time = 09 + ':' + 00;
        var $defautl_close_time = 21 + ':' + 00;
        var buttonDefaultTime = document.querySelector('#btn-default-time');
        var formDefaultTime = document.getElementById('form-default-time');
        var defaultOpenTime = document.getElementById('default_open_time');
        var defaultCloseTime = document.getElementById('default_close_time');
        var openTimeFields = document.querySelectorAll('.open_time_field');
        var closeTimeFields = document.querySelectorAll('.close_time_field');
        // set default time for all fields on click button
        if (buttonDefaultTime) {

            buttonDefaultTime.addEventListener('click', function(e) {
                console.log('buttonDefaultTime clicked');
                e.preventDefault();
                openTimeFields.forEach(function(openTimeField) {
                    openTimeField.value = $defautl_open_time;
                });
                closeTimeFields.forEach(function(closeTimeField) {
                    closeTimeField.value = $defautl_close_time;
                });


            });
        } else {
            console.log('buttonDefaultTime not found');
        }
    </script>
@endsection
