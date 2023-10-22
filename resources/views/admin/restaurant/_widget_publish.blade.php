 <div class="card">
     <div class="card-header">
         <h5>{{ __('label.publish') }}</h5>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
         {{-- is_active  select --}}
         <div class="mb-3">
             <label for="is_active" class="form-label">{{ __('label.active') }}</label>
             <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                 {{-- default option --}}
                 <option>{{ __('label.select') }}</option>
                 <option value="0" {{ isset($restaurant) && $restaurant->is_active == 0 ? 'selected' : '' }}
                     {{-- {{ old('is_active') == 0 ? 'selected' : '' }} --}}> {{ __('label.no') }}</option>
                 <option value="1" {{ isset($restaurant) && $restaurant->is_active == 1 ? 'selected' : '' }}
                     {{-- {{ old('is_active') == 1 ? 'selected' : '' }} --}}> {{ __('label.yes') }}</option>
             </select>
             @error('is_active')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
             <div class="form-text">{{ __('label.is_it_active') }}</div>
         </div>

         {{-- created_at --}}
         <div>
             {{ __('label.created_at') }}: {{ isset($restaurant) ? $restaurant->created_at : '' }}
         </div>
         <div>
             {{ __('label.updated_at') }}: {{ isset($restaurant) ? $restaurant->updated_at : '' }}
         </div>
         {{-- createdby_id --}}
         <div>
             {{ __('label.created_by') }}:
             {!! isset($restaurant) ? '<b>' . $restaurant->createdBy->fullName() . '</b>' : '' !!}
         </div>


     </div>
     <!-- /.card-body -->
     <div class="card-footer text-end">
         <button type="submit" class="btn btn-primary btn-block">{{ __('label.publish') }}</button>
     </div>
 </div>
 <!-- /.card -->
