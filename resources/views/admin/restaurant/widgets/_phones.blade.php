<div class="card mt-4">
    <div class="card-header">
        <h5> {{ __('label.phones') }}</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- list of phones --}}
        @if (isset($restaurant) && $restaurant->phones->count() > 0)
            <table>
                <tbody>
                    @foreach ($restaurant->phones as $phone)
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <input type="text" name="phones[]" id="phone_{{ $phone->id }}"
                                        class="form-control @error('phones') is-invalid @enderror"
                                        value="{{ $phone->phone }}" placeholder="{{ __('label.phone') }}"
                                        aria-describedby="phoneHelp">
                                    @error('phones')
                                        <div id="phoneHelp" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deletePhoneWithAxios({{ $phone->id }})">
                                        <i class="bi bi-trash"></i>
                                        {{ __('label.delete') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{-- add new phone --}}
        <div id="phoneNumbers">
            <!-- Initial phone number input field -->
            <div class="form-group mb-2">
                <label for="phone">{{ __('label.phone') }}:</label>
                <input type="text" name="phones[]" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-sm btn-info" onclick="addPhone()">
                <i class="bi bi-plus-circle"></i>
                {{ __('label.add_phone') }}
            </button>
            <div id="phoneHelp" class="form-text">{{ __('label.phone_help') }}</div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card mt-4 -->

<script>
    function addPhone() {
        var html = '<div class="form-group mb-2">';
        html += '<label for="phone">{{ __('label.phone') }}:</label>';
        html += '<input type="text" name="phones[]" class="form-control" required>';
        html += '</div>';
        $('#phoneNumbers').append(html);
    }

    function deletePhone(id) {
        <?php  if (isset($restaurant) && $restaurant->phones->count() > 0) : ?>
        var url = "{{ route('admin.restaurant.phone.delete', [':IDrestaurant', ':id']) }}";
        url = url.replace(':id', id);
        url = url.replace(':IDrestaurant', {{ $restaurant->id }});
        console.log(url);
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                console.log(response.status);
                if (response.status == 200) {
                    $('#phone_' + id).parent().parent().remove();
                }
            }
        });
        <?php endif; ?>
    }

    function deletePhoneWithAxios(id) {
        var confirmed = window.confirm('{{ __('label.are-you-sure') }}');
        if (!confirmed) {
            return;
        }
        <?php  if (isset($restaurant) && $restaurant->phones->count() > 0) : ?>
        var url = "{{ route('admin.restaurant.phone.delete', [':IDrestaurant', ':id']) }}";
        url = url.replace(':id', id);
        url = url.replace(':IDrestaurant', {{ $restaurant->id }});
        console.log(url);
        axios.delete(url, {
                _token: "{{ csrf_token() }}",
            })
            .then(function(response) {
                console.log(response);
                if (response.status == 200) {
                    $('#phone_' + id).parent().parent().parent().remove();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
        <?php endif; ?>
    }
</script>
