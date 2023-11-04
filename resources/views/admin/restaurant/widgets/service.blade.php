<div class="card mt-4">
    <div class="card-header">
        <h5>{{ __('label.service') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @php
            $services = App\Models\Service::all();
        @endphp

        @foreach ($services as $service)
            <div class="mb-3">
                <input type="checkbox" name="services[]" id="service_{{ $service->id }}" value="{{ $service->id }}"
                    class="form-check-input @error('services') is-invalid @enderror"
                    @if (isset($restaurant) && $restaurant->services->contains($service->id)) checked @endif>
                <label for="service_{{ $service->id }}" class="form-check-label"> {{ $service->name }}</label>
                @error('services')
                    <div id="servicesHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>
            <!-- /.mb-3 -->
        @endforeach

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card mt-4 -->
