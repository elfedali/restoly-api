<div class="card">
    <div class="card-body">

        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>{{ __('label.id') }}</th>
                    <th>{{ __('label.username') }}</th>
                    <th>{{ __('label.full-name') }}</th>
                    <th>{{ __('label.role') }}</th>
                    <th>{{ __('label.email') }}</th>
                    <th>{{ __('label.has-restaurant') }}</th>
                    <th>{{ __('label.createdby') }}</th>
                    <th>{{ __('label.active') }}</th>
                    <th>{{ __('label.member-since') }}</th>
                    <th>{{ __('label.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isEmpty())
                    <tr>
                        <td colspan="10">{{ __('label.no-record-found') }}</td>
                    </tr>
                @endif
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="{{ route('admin.user.show', $user) }}">
                                {{ $user->username }}
                            </a>
                        </td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>
                            @if ($user->role == 'admin')
                                <span><span class="text-danger">* </span>{{ __('label.admin') }}</span>
                            @elseif($user->role == 'commercial')
                                <span><span class="text-primary">* </span>{{ __('label.commercial') }}</span>
                            @else
                                <span>{{ __('label.user') }}</span>
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->hasRestaurant())
                                <x-yes></x-yes>
                            @else
                                <x-no></x-no>
                            @endif
                        </td>
                        <td>
                            @if ($user->createdby_id)
                                {{ $user->createdBy->fullName() }}
                            @else
                                <x-empty></x-empty>
                            @endif
                        </td>
                        <td>

                            @if ($user->is_active)
                                <x-yes></x-yes>
                            @else
                                <x-no></x-no>
                            @endif
                        </td>
                        <td>

                            {{ $user->created_at->diffForHumans() }}
                        <td>

                            <a class="btn btn-sm btn-secondary me-2" href="{{ route('admin.user.show', $user) }}"
                                role="button">
                                <i class="bi bi-eye"></i>
                                {{ __('label.edit') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
        </table>

        <div class="">
            {{ $users->links() }}
        </div>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
