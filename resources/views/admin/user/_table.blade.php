  <div class="card">
      <div class="card-body">
          <h5>
              {{ __('label.list') }}
          </h5>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>{{ __('label.id') }}</th>
                      <th>{{ __('label.username') }}</th>
                      <th>{{ __('label.full-name') }}</th>
                      <th>{{ __('label.email') }}</th>
                      <th>{{ __('label.has-restaurant') }}</th>
                      <th>{{ __('label.active') }}</th>
                      <th>{{ __('label.actions') }}</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>
                              <a href="{{ route('admin.user.show', $user) }}">
                                  {{ $user->username }}
                              </a>
                          </td>
                          <td>{{ $user->first_name }} <b>{{ $user->last_name }}</b></td>
                          <td>{{ $user->email }}</td>
                          <td>
                              @if ($user->hasRestaurant())
                                  <span class="badge bg-success">{{ __('label.yes') }}</span>
                              @else
                                  <span class="badge bg-danger">{{ __('label.no') }}</span>
                                  |
                                  <a class="btn btn-sm btn-info" href="#">
                                      {{ __('label.create') }}
                                  </a>
                              @endif
                          </td>
                          <td>

                              @if ($user->is_active)
                                  <span class="badge bg-success">{{ __('label.yes') }}</span>
                              @else
                                  <span class="badge bg-danger">{{ __('label.no') }}</span>
                              @endif

                          <td>

                              <a class="btn btn-sm btn-primary me-2" href="{{ route('admin.user.show', $user) }}"
                                  role="button">
                                  <i class="bi bi-eye"></i>
                                  {{ __('label.show') }}
                              </a>
                          </td>
                      </tr>
                  @endforeach
          </table>
      </div>
      <!-- /.card-body -->
  </div>
  <!-- /.card -->
