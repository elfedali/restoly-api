   <div class="card">
       <div class="card-body">
           <h5>
               {{ __('label.create') }}
           </h5>
           <form action="{{ route('admin.user.store') }}" method="POST" autocomplete="off">
               @csrf
               <div class="mb-3">
                   <label for="username" class="form-label">{{ __('label.username') }}</label>
                   <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                       name="username" value="{{ old('username') }}" required autofocus autocomplete="off">
                   @error('username')
                       <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
                   <div class="form-text">{{ __('label.username-help') }}</div>
               </div>
               <div class="mb-3">
                   <label for="first_name" class="form-label">{{ __('label.first-name') }}</label>
                   <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                       name="first_name" value="{{ old('first_name') }}">
                   @error('first_name')
                       <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
                   <div class="form-text">{{ __('label.first-name-help') }}</div>
               </div>
               <div class="mb-3">
                   <label for="last_name" class="form-label">{{ __('label.last-name') }}</label>
                   <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                       name="last_name" value="{{ old('last_name') }}">
                   @error('last_name')
                       <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
                   <div class="form-text">{{ __('label.last-name-help') }}</div>
               </div>
             
               {{-- password --}}
               <div class="mb-3">
                   <label for="password" class="form-label">{{ __('label.password') }}</label>
                   <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       name="password" value="{{ old('password') }}">
                   @error('password')
                       <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
                   <div class="form-text">{{ __('label.password-help') }}</div>
               </div>
               {{-- password_confirmation --}}
               <div class="mb-3">
                   <label for="password_confirmation"
                       class="form-label">{{ __('label.password-confirmation') }}</label>
                   <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                       id="password_confirmation" name="password_confirmation"
                       value="{{ old('password_confirmation') }}">
                   @error('password_confirmation')
                       <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
                   <div class="form-text">{{ __('label.password-confirmation-help') }}</div>
               </div>

               {{-- is_active --}}
               <div class="mb-3">
                   <label for="is_active" class="form-label">{{ __('label.active') }}</label>
                   <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                       <option value="0" @if (old('is_active') == 0) selected @endif>
                           {{ __('label.no') }}</option>
                       <option value="1" @if (old('is_active') == 1) selected @endif>
                           {{ __('label.yes') }}</option>
                   </select>
                   @error('is_active')
                       <div class="invalid-feedback">{{ $message }}</div>
                   @enderror
                   <div class="form-text">{{ __('label.is_it_active') }}</div>
               </div>
               <div class="d-flex justify-content-between align-items-center">
                   <button type="submit" class="btn btn-primary">{{ __('label.save') }}</button>
                   {{-- reset form --}}
                   <button type="reset" class="btn btn-secondary">{{ __('label.reset') }}</button>
               </div>
               <!-- /.d-flex -->
           </form>
       </div>
       <!-- /.card-body -->
   </div>
   <!-- /.card -->
