<div class="card mt-4">
    <div class="card-header">
        <h5>
            {{ __('label.links') }}
        </h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- list of links --}}
        @if (isset($restaurant) && $restaurant->links->count() > 0)
            @foreach ($restaurant->links as $link)
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="text" name="links[name][]" id="link_{{ $link->id }}"
                                class="form-control @error('links.name') is-invalid @enderror"
                                value="{{ $link->name }}" placeholder="{{ __('label.link_name') }}"
                                aria-describedby="linkHelpName">
                            @error('links.name')
                                <div id="linkHelpName" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.mb-3 -->
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="text" name="links[url][]" class="form-control" value="{{ $link->url }}"
                                placeholder="{{ __('label.link_url') }}" aria-describedby="linkHelpUrl">
                            @error('links.url')
                                <div id="linkHelpUrl" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.mb-3 -->
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="deleteLinkWithAxios({{ $link->id }})">
                                <i class="bi bi-trash"></i>
                                {{ __('label.delete') }}
                            </button>
                        </div>
                        <!-- /.mb-3 -->
                    </div>
                </div> <!-- /.row -->
            @endforeach
        @endif

        {{-- add new link --}}
        <div id="linkList">
            <!-- Initial link number input field -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <label for="link_name">{{ __('label.link_name') }}:</label>
                        <input type="text" name="links[name][]" class="form-control" required>
                    </div>

                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="form-group mb-2">
                        <label for="link_url">{{ __('label.link_url') }}:</label>
                        <input type="text" name="links[url][]" class="form-control" required>
                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-4"></div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->

        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-sm btn-info" onclick="addLink()">
                <i class="bi bi-plus-circle"></i>
                {{ __('label.add_link') }}
            </button>
            <div id="linkHelp" class="form-text">{{ __('label.link_help') }}</div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


<script>
    function addLink() {
        var html = '<div class="row">';
        html += '<div class="col-md-4">';
        html += '<div class="form-group mb-2">';
        html += '<label for="link_name">{{ __('label.link_name') }}:</label>';
        html += '<input type="text" name="links[name][]" class="form-control" required>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<div class="form-group mb-2">';
        html += '<label for="link_url">{{ __('label.link_url') }}:</label>';
        html += '<input type="text" name="links[url][]" class="form-control" required>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '</div';
        html += '</div>';
        $('#linkList').append(html);
    }

    function deleteLink(id) {
        <?php  if (isset($restaurant) && $restaurant->links->count() > 0) : ?>
        var url = "{{ route('admin.restaurant.link.delete', [':IDrestaurant', ':id']) }}";
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
                    $('#link_' + id).parent().parent().parent().remove();
                }
            }
        });
        <?php endif; ?>
    }

    function deleteLinkWithAxios(id) {
        var confirmed = window.confirm('{{ __('label.are-you-sure') }}');
        if (!confirmed) {
            return;
        }
        <?php  if (isset($restaurant) && $restaurant->links->count() > 0) : ?>
        var url = "{{ route('admin.restaurant.link.delete', [':IDrestaurant', ':id']) }}";
        url = url.replace(':id', id);
        url = url.replace(':IDrestaurant', {{ $restaurant->id }});
        console.log(url);
        axios.delete(url, {
                _token: "{{ csrf_token() }}",
            })
            .then(function(response) {
                console.log(response);
                if (response.status == 200) {
                    $('#link_' + id).parent().parent().parent().remove();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
        <?php endif; ?>
    }
</script>
