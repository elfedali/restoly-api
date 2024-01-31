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
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th> {{ __('label.id') }} </th>
                                <th> {{ __('label.rating') }} </th>
                                <th style="width:10%; "> {{ __('label.reviewer') }} </th>

                                <th> {{ __('label.review') }} </th>

                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->rating }}
                                            @for ($i = 0; $i < $review->rating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.show', $review->reviewer->id) }}">
                                                {{ $review->reviewer->fullName() }}
                                            </a>
                                        </td>
                                        <td>{{ $review->comment }}</td>
                                        {{-- <td>
                                            <form
                                                action="{{ route('admin.restaurant.review.destroy', [$restaurant->id, $review->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td> --}}
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
