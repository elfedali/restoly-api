<div class="card">
    <div class="card-body">

        <table class="table table-hover table-responsive">
    <thead >
        <tr>
            <th>{{ __('label.id') }}</th>
            <th>{{ __('label.username') }}</th>
            <th>{{ __('label.full-name') }}</th>
            <th>{{ __('label.role') }}</th>
            <th>{{ __('label.email') }}</th>
            <th>{{ __('label.has-restaurant') }}</th>
            <th>{{ __('label.active') }}</th>
            <th>{{ __('label.member-since') }}</th>
            <th>{{ __('label.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->isEmpty())
            <tr>
                <td colspan="8">{{ __('label.no-record-found') }}</td>
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
                    @if ($user->is_admin)
                        <span class="badge bg-success">{{ __('label.admin') }}</span>
                    @else
                        <span class="badge bg-secondary">{{ __('label.user') }}</span>
                    @endif
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->hasRestaurant())
                        <span class="badge bg-success">{{ __('label.yes') }}</span>
                    @else
                        <span class="badge bg-warning">{{ __('label.no') }}</span>
                        
                    @endif
                </td>
                <td>

                    @if ($user->is_active)
                        <span class="badge bg-success">{{ __('label.yes') }}</span>
                    @else
                        <span class="badge bg-danger">{{ __('label.no') }}</span>
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