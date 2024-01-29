<div class="card mb-3">
    <div class="card-body">
        <h5>
            {{ __('label.filter') }}
        </h5>
        <!-- Existing form for creating a user -->
        <!-- ... (existing form code) ... -->

        {{-- Filter form --}}
        <form action="{{ route('admin.user.index') }}" method="GET" autocomplete="off" id="filterForm">
            <div class="row d-flex align-items-end">
                <div class="col">
                    <label for="filter_username" class="form-label">{{ __('label.username') }}</label>
                    <input type="text" class="form-control" id="filter_username" name="filter[username]"
                        value="{{ request('filter.username') }}">

                </div>

                <div class="col">
                    <label for="filter_status" class="form-label">{{ __('label.status') }}</label>
                    <select class="form-select" id="filter_status" name="filter[status]">
                        <option value="any" @if (request('filter.status') == 'any') selected @endif>
                            {{ __('label.any') }}</option>
                        <option value="active" @if (request('filter.status') == 'active') selected @endif>
                            {{ __('label.active') }}</option>
                        <option value="inactive" @if (request('filter.status') == 'inactive') selected @endif>
                            {{ __('label.inactive') }}</option>
                    </select>
                </div>

                <div class="col">
                    <label for="filter_role" class="form-label">{{ __('label.role') }}</label>
                    <select class="form-select" id="filter_role" name="filter[role]">
                        <option value="any" @if (request('filter.role') == 'any') selected @endif>
                            {{ __('label.any') }}</option>
                        <option value="admin" @if (request('filter.role') == 'admin') selected @endif>
                            {{ __('label.admin') }}</option>
                        <option value="user" @if (request('filter.role') == 'user') selected @endif>
                            {{ __('label.user') }}</option>
                    </select>
                </div>
                <div class="col">
                    <label for="filter_restaurant" class="form-label">{{ __('label.restaurant') }}</label>
                    <select class="form-select" id="filter_restaurant" name="filter[has_restaurant]">
                        <option value="any" @if (request('filter.has_restaurant') == 'any') selected @endif>
                            {{ __('label.any') }}</option>
                        <option value="yes" @if (request('filter.has_restaurant') == 'yes') selected @endif>
                            {{ __('label.has-restaurant') }}</option>
                        <option value="no" @if (request('filter.has_restaurant') == 'no') selected @endif>
                            {{ __('label.has-no-restaurant') }}</option>
                    </select>
                </div>
                <div class="col text-end">


                    <button type="submit" class="btn btn-primary mx-3">
                        {{ __('label.filter') }}
                        <i class="bi bi-funnel"></i>
                    </button>

                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise"></i>
                        {{ __('label.reset-filters') }}
                    </a>

                </div>
            </div>
            <!-- /.mb-3 -->

        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
