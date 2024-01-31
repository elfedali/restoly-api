                      {{-- add menu item modal --}}
                      <div class="modal fade" id="menu-item-{{ $menuCategory->id }}" tabindex="-1"
                          aria-labelledby="ModalLabel-{{ $menuCategory->id }}" aria-hidden="true">
                          <form
                              action="{{ route('admin.restaurant.menu.storeMenuItem', [$restaurant->id, $menuCategory]) }}"
                              method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title fs-5" id="ModalLabel-{{ $menuCategory->id }}">
                                              {{ __('label.add_menu_item') }} : {{ $menuCategory->name }}
                                          </h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                              aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">

                                          {{-- hidden menu_category_id --}}
                                          <input type="hidden" name="menu_category_id" value="{{ $menuCategory->id }}">

                                          <div class="mb-3">
                                              <label for="menu-item"
                                                  class="form-label">{{ __('label.menu_item_name') }}</label>
                                              <input name="name" type="text" class="form-control" id="menu-item"
                                                  placeholder="">
                                          </div>
                                          {{-- price --}}
                                          <div class="mb-3">
                                              <label for="menu-item-price"
                                                  class="form-label">{{ __('label.menu_item_price') }}</label>
                                              <input name="price" type="number" class="form-control"
                                                  id="menu-item-price" placeholder="">
                                          </div>
                                          {{-- description --}}
                                          <div class="mb-3">
                                              <label for="menu-item-description"
                                                  class="form-label">{{ __('label.menu_item_description') }}</label>
                                              <textarea name="description" class="form-control" id="menu-item-description" placeholder=""></textarea>
                                          </div>
                                          {{-- image --}}
                                          <div class="mb-3">
                                              <label for="menu-item-image"
                                                  class="form-label">{{ __('label.menu_item_image') }}</label>
                                              <input name="image" type="file" class="form-control"
                                                  id="menu-item-image" placeholder="">
                                          </div>


                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary"
                                              data-bs-dismiss="modal">{{ __('label.close') }}</button>

                                          <button type="submit"
                                              class="btn btn-primary">{{ __('label.submit') }}</button>

                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>

                      {{-- add menu item modal end --}}
