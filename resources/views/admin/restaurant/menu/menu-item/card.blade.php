<h6 class="text-muted">
    {{ __('label.menu_items') }} : {{ $menuCategory->name }}
</h6>
@if ($menuCategory->items->count() == 0)
    <p>{{ __('label.no_menu_items') }}</p>
@else
    <ul class="list-unstyled p-3">
        @foreach ($menuCategory->items as $item)
            <li class="mb-3 border-bottom card" id="menu-item-{{ $item->id }}">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>{{ $item->name }} | {{ $item->price }} dhs</h6>
                        <div>
                            <a href="#" class="collapsed" data-bs-toggle="collapse"
                                data-bs-target="#menu-item-{{ $item->id }}-collapse" aria-expanded="false"
                                aria-controls="menu-item-{{ $item->id }}-collapse">
                                <i class="fas fa-chevron-down"></i>




                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse card-body" id="menu-item-{{ $item->id }}-collapse">
                    <form
                        action="{{ route('admin.restaurant.menu.updateMenuItem', [$restaurant->id, $menuCategory, $item->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label for="menu-item" class="form-label">{{ __('label.menu_item_name') }}</label>
                                    <input name="name" type="text" class="form-control" id="menu-item"
                                        placeholder="{{ $item->name }}" value="{{ $item->name }}">
                                </div>
                            </div>
                            <!-- /.col-lg -->
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label for="menu-item-price"
                                        class="form-label">{{ __('label.menu_item_price') }}</label>
                                    <input name="price" type="number" class="form-control" id="menu-item-price"
                                        placeholder="{{ $item->price }}" value="{{ $item->price }}">
                                </div>
                            </div>
                            <!-- /.col-lg -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label for="menu-item-description"
                                        class="form-label">{{ __('label.menu_item_description') }}</label>
                                    <textarea name="description" class="form-control" id="menu-item-description" placeholder="{{ $item->description }}">{{ $item->description }}</textarea>
                                </div>
                            </div>
                            <!-- /.col-lg -->
                            <div class="col-lg">
                                <div class="mb-3">

                                    <label for="menu-item-image"
                                        class="form-label">{{ __('label.menu_item_image') }}</label>
                                    <input name="image" type="file" class="form-control mb-2" id="menu-item-image"
                                        placeholder="" value="">

                                    @if ($item->image)
                                        <div>
                                            <img src="{{ asset($item->image->path()) }}" alt="{{ $item->name }}"
                                                width="100" height="100" class="img-fluid rounded mb-2" />
                                        </div>
                                    @else
                                        {{-- no --}}
                                    @endif
                                </div>
                            </div>
                            <!-- /.col-lg -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-lg">
                                {{-- is_active --}}
                                <div class="mb-3">
                                    <label for="menu-item-is-active"
                                        class="form-label">{{ __('label.menu_item_is_active') }}</label>
                                    <select name="is_active" class="form-select" id="menu-item-is-active">
                                        <option value="1" @if ($item->is_active == 1) selected @endif>
                                            {{ __('label.yes') }}</option>
                                        <option value="0" @if ($item->is_active == 0) selected @endif>
                                            {{ __('label.no') }}</option>
                                    </select>
                                </div>
                                {{-- is_veg --}}
                                <div class="mb-3">
                                    <label for="menu-item-is-veg"
                                        class="form-label">{{ __('label.menu_item_is_veg') }}</label>
                                    <select name="is_veg" class="form-select" id="menu-item-is-veg">
                                        <option value="1" @if ($item->is_veg == 1) selected @endif>
                                            {{ __('label.yes') }}</option>
                                        <option value="0" @if ($item->is_veg == 0) selected @endif>
                                            {{ __('label.no') }}</option>
                                    </select>
                                </div>
                                {{-- is_popular --}}
                                <div class="mb-3">
                                    <label for="menu-item-is-popular"
                                        class="form-label">{{ __('label.menu_item_is_popular') }}</label>
                                    <select name="is_popular" class="form-select" id="menu-item-is-popular">
                                        <option value="1" @if ($item->is_popular == 1) selected @endif>
                                            {{ __('label.yes') }}</option>
                                        <option value="0" @if ($item->is_popular == 0) selected @endif>
                                            {{ __('label.no') }}</option>
                                    </select>
                                </div>
                                {{-- position --}}
                                <div class="mb-3">
                                    <label for="menu-item-position"
                                        class="form-label">{{ __('label.menu_item_position') }}</label>
                                    <input name="position" type="number" class="form-control" id="menu-item-position"
                                        placeholder="{{ $item->position }}" value="{{ $item->position }}">
                                </div>

                            </div>
                            <!-- /.col-lg -->
                            <div class="col-lg"></div>
                            <!-- /.col-lg -->
                        </div>
                        <!-- /.row -->



                        <div class="text-end">
                            {{-- submit --}}
                            <button type="submit" class="btn btn-sm btn-primary">
                                {{ __('label.update') }}
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>

                    </form>
                    {{-- delete --}}
                    <div class="text-end">
                        <form
                            action="{{ route('admin.restaurant.menu.destroyMenuItem', [$restaurant->id, $menuCategory, $item->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger mt-2"
                                onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt"></i>
                                {{ __('label.delete') }}
                            </button>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->

            </li>
        @endforeach
    </ul>
@endif
