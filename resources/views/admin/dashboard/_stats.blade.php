<div class="card">
    {{-- TODO:: this should be a component with class  --}}
    <div class="card-body">
        <h5 class="card-title">{{ __('Dashboard') }}</h5>
        <div class="row">
            <div class="col-md-4">

                <div class="rounder border p-3">
                    <i class="bi bi-people-fill"></i>
                    <h3>{{ \App\Models\User::count() }}</h3>
                    <p>{{ __('label.users') }}</p>
                    <a href="{{ route('admin.user.index') }}" class="small-box-footer">
                        {{ __('label.more-info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                {{-- restaurnat --}}
                <div class="rounder border p-3">

                    <i class="bi bi-people-fill"></i>
                    <h3>{{ \App\Models\Restaurant::count() }}</h3>
                    <p>{{ __('label.restaurants') }}</p>
                    <a href="{{ route('admin.restaurant.index') }}" class="small-box-footer">
                        {{ __('label.more-info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <div class="rounder border p-3">
                    <i class="bi bi-people-fill"></i>
                    <h3>{{ \App\Models\Reservation::count() }}</h3>
                    <p>{{ __('label.reservations') }}</p>
                    <a href="{{ route('admin.reservation.index') }}" class="small-box-footer">
                        {{ __('label.more-info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
