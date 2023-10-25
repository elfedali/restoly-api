 <div class="card mt-4">
     <div class="card-body">
         <h5>
             {{ __('label.change-password') }}
         </h5>
         <form action="{{ route('admin.user.update-password', $user) }}" method="POST">
             @csrf
             @method('PUT')
             <div class="mb-3">
                 <label for="password" class="form-label">{{ __('label.password') }}</label>
                 <input type="password" name="password" id="password"
                     class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                     aria-describedby="passwordHelp">
                 @error('password')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
                 <div id="passwordHelp" class="form-text">{{ __('label.password-help') }}</div>
             </div>
             <div class="mb-3">
                 <label for="password_confirmation" class="form-label">{{ __('label.password-confirmation') }}</label>
                 <input type="password" name="password_confirmation" id="password_confirmation"
                     class="form-control @error('password_confirmation') is-invalid @enderror"
                     value="{{ old('password_confirmation') }}" aria-describedby="password_confirmationHelp">
                 @error('password_confirmation')
                     <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
                 <div id="password_confirmationHelp" class="form-text">{{ __('label.password-confirmation-help') }}
                 </div>
             </div>
             <div class="d-flex justify-content-between">
                 <button type="submit" class="btn btn-primary">{{ __('label.update') }}</button>
                 <a href="{{ route('admin.user.index') }}" class="btn btn-light">
                     {{ __('label.cancel') }}
                 </a>
             </div>
         </form>
     </div>
     <!-- /.card-body -->
 </div>
