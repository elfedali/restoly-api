@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('Category') }}</h1>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <div class="row">

            <table>
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Slug') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <a href="{{ route('admin.category.show', $category) }}">
                                    {{ $category->name }}
                                </a>
                            </td>
                            <td>{{ $category->slug }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
