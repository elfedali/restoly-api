@extends('layouts.app')

@section('title', __('label.user') . ' # ' . $user->id)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('label.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('label.users') }}</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">{{ $user->username }}</li>
                    </ol>
                </nav>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ __('label.user') }} #{{ $user->id }}</h5>
                        <table class="table table-striped ">

                            <tr>
                                <th>{{ __('label.id') }}</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.username') }}</th>
                                <td><u>{{ $user->username }}</u></td>
                            <tr>
                            <tr>
                                <th>{{ __('label.first_name') }}</th>
                                <td>{{ $user->first_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.last_name') }}</th>
                                <td><b>{{ $user->last_name }}</b></td>
                            </tr>
                            <tr>
                                <th>{{ __('label.active') }}</th>
                                <td>
                                    @if ($user->is_active)
                                        <span class="badge bg-success">{{ __('label.yes') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('label.no') }}</span>
                                    @endif

                                    {{-- toggle is_active form --}}
                                    {{-- <form action="{{ route('admin.user.toggle', $user) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-light" title="{{ __('Toggle') }}"
                                            onclick="return confirm('{{ __('label.are-you-sure') }}')">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    </form> --}}

                                </td>
                            </tr>
                            {{-- bio --}}
                            <tr>
                                <th>{{ __('label.bio') }}</th>
                                <td>{{ $user->bio ?? '_' }}</td>
                            </tr>
                            {{-- telephone --}}
                            <tr>
                                <th>{{ __('label.telephone') }}</th>
                                <td>{{ $user->telephone ?? '_' }}</td>
                            </tr>
                            {{-- address, city country, postal code --}}
                            <tr>
                                <th>{{ __('label.address') }}</th>
                                <td>{{ $user->address ?? '_' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.city') }}</th>
                                <td>{{ $user->city ?? '_' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.country') }}</th>
                                <td>{{ $user->country ?? '_' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.postal_code') }}</th>
                                <td>{{ $user->postal_code ?? '_' }}</td>
                            </tr>
                            {{-- sms_notification --}}
                            <tr>
                                <th>{{ __('label.sms_notification') }}</th>
                                <td>
                                    @if ($user->sms_notification)
                                        <span class="badge bg-success">{{ __('label.yes') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('label.no') }}</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- role --}}
                            <tr>
                                <th>{{ __('label.role') }}</th>
                                <td><b>{{ $user->role }}</b></td>
                            </tr>


                            {{-- email --}}


                            <tr>
                                <th>{{ __('label.email') }}</th>
                                <td>{{ $user->email }}</td>
                            </tr>

                            {{-- email_notification --}}
                            <tr>
                                <th>{{ __('label.email_notification') }}</th>
                                <td>
                                    @if ($user->email_notification)
                                        <span class="badge bg-success">{{ __('label.yes') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('label.no') }}</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- email_verified_at --}}
                            <tr>
                                <th>{{ __('label.email_verified_at') }}</th>
                                <td>{{ $user->email_verified_at ?? '_' }}</td>
                            </tr>



                            <tr>
                                <th>{{ __('label.created_at') }}</th>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('label.updated_at') }}</th>
                                <td>{{ $user->updated_at }}</td>
                            </tr>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                {{-- cancel btn go t index --}}
                <div class="mt-4">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-light">

                        <i class="bi bi-arrow-left"></i>

                        {{ __('label.go-back') }}
                    </a>
                </div>
                {{-- edit btn go to edit --}}
            </div>
            <!-- /.col-6 -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        {{-- edit  --}}
                        <h5>
                            {{ __('label.edit') }} #{{ $user->id }}
                        </h5>

                        <form action="{{ route('admin.user.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="username" class="form-label">{{ __('label.username') }}</label>
                                <input type="text" name="username" id="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ $user->username }}" aria-describedby="usernameHelp">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="usernameHelp" class="form-text">{{ __('label.username-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">{{ __('label.first_name') }}</label>
                                <input type="text" name="first_name" id="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    value="{{ $user->first_name }}" aria-describedby="first_nameHelp">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="first_nameHelp" class="form-text">{{ __('label.first-name-help') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">{{ __('label.last_name') }}</label>
                                <input type="text" name="last_name" id="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ $user->last_name }}" aria-describedby="last_nameHelp">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="last_nameHelp" class="form-text">{{ __('label.last-name-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="is_active" class="form-label">{{ __('label.active') }}</label>
                                <select name="is_active" id="is_active"
                                    class="form-select @error('is_active') is-invalid @enderror"
                                    aria-describedby="is_activeHelp">
                                    <option value="0" @if (!$user->is_active) selected @endif>
                                        {{ __('label.no') }}</option>
                                    <option value="1" @if ($user->is_active) selected @endif>
                                        {{ __('label.yes') }}</option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('label.is_it_active') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">{{ __('label.bio') }}</label>
                                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror"
                                    aria-describedby="bioHelp">{{ $user->bio }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="bioHelp" class="form-text">{{ __('label.bio-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="telephone" class="form-label">{{ __('label.telephone') }}</label>
                                <input type="text" name="telephone" id="telephone"
                                    class="form-control @error('telephone') is-invalid @enderror"
                                    value="{{ $user->telephone }}" aria-describedby="telephoneHelp">
                                @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="telephoneHelp" class="form-text">{{ __('label.telephone-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('label.address') }}</label>
                                <input type="text" name="address" id="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ $user->address }}" aria-describedby="addressHelp">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="addressHelp" class="form-text">{{ __('label.address-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label">{{ __('label.city') }}</label>
                                <input type="text" name="city" id="city"
                                    class="form-control @error('city') is-invalid @enderror" value="{{ $user->city }}"
                                    aria-describedby="cityHelp">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="cityHelp" class="form-text">{{ __('label.city-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">{{ __('label.country') }}</label>
                                <input type="text" name="country" id="country"
                                    class="form-control @error('country') is-invalid @enderror"
                                    value="{{ $user->country }}" aria-describedby="countryHelp">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="countryHelp" class="form-text">{{ __('label.country-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="postal_code" class="form-label">{{ __('label.postal_code') }}</label>
                                <input type="text" name="postal_code" id="postal_code"
                                    class="form-control @error('postal_code') is-invalid @enderror"
                                    value="{{ $user->postal_code }}" aria-describedby="postal_codeHelp">
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="postal_codeHelp" class="form-text">{{ __('label.postal-code-help') }}</div>

                            </div>

                            <div class="mb-3">
                                <label for="sms_notification"
                                    class="form-label">{{ __('label.sms_notification') }}</label>
                                <select name="sms_notification" id="sms_notification"
                                    class="form-select @error('sms_notification') is-invalid @enderror"
                                    aria-describedby="sms_notificationHelp">
                                    <option value="0" @if (!$user->sms_notification) selected @endif>
                                        {{ __('label.no') }}</option>
                                    <option value="1" @if ($user->sms_notification) selected @endif>
                                        {{ __('label.yes') }}</option>
                                </select>
                                @error('sms_notification')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="sms_notificationHelp" class="form-text">
                                    {{ __('label.sms-notification-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('label.email') }}</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $user->email }}" aria-describedby="emailHelp">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="emailHelp" class="form-text">{{ __('label.email-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="email_notification"
                                    class="form-label">{{ __('label.email_notification') }}</label>
                                <select name="email_notification" id="email_notification"
                                    class="form-select @error('email_notification') is-invalid @enderror"
                                    aria-describedby="email_notificationHelp">
                                    <option value="0" @if (!$user->email_notification) selected @endif>
                                        {{ __('label.no') }}</option>
                                    <option value="1" @if ($user->email_notification) selected @endif>
                                        {{ __('label.yes') }}</option>
                                </select>
                                @error('email_notification')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="email_notificationHelp" class="form-text">
                                    {{ __('label.email-notification-help') }}</div>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">{{ __('label.role') }}</label>
                                <select name="role" id="role"
                                    class="form-select @error('role') is-invalid @enderror" aria-describedby="roleHelp">
                                    <option value="user" @if ($user->role == 'user') selected @endif>
                                        {{ __('label.user') }}</option>
                                    <option value="admin" @if ($user->role == 'admin') selected @endif>
                                        {{ __('label.admin') }}</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div id="roleHelp" class="form-text">{{ __('label.role-help') }}</div>
                            </div>






                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">{{ __('label.update') }}</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-light">
                                    {{ __('label.cancel') }}
                                </a>
                            </div>
                            <!-- /.d-flex -->

                        </form>
                        <hr>
                        {{-- delete --}}
                        <div class="text-end">
                            <form action="{{ route('admin.user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('{{ __('Are you sure?') }}')">
                                    <i class="bi bi-trash"></i>
                                    {{ __('label.delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
