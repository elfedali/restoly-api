   <div class="card">
       <div class="card-body">
           <h5>
               {{ __('label.new') }}
           </h5>
           <hr>
           <form action="{{ route('admin.user.store') }}" method="POST">
               @csrf

               <div class="row">
                   <div class="col-md">
                       <div class="mb-3">
                           <label for="first_name" class="form-label">{{ __('label.first-name') }}
                               <span class="text-danger">*</span>
                           </label>
                           <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                               id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                           @error('first_name')
                               <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <div class="form-text">{{ __('label.first-name-help') }}</div>
                       </div>

                   </div>
                   <!-- /.col -->
                   <div class="col-md">
                       <div class="mb-3">
                           <label for="last_name" class="form-label">{{ __('label.last-name') }}
                               <span class="text-danger">*</span>
                           </label>
                           <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                               id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                           @error('last_name')
                               <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <div class="form-text">{{ __('label.last-name-help') }}</div>
                       </div>
                   </div>
                   <!-- /.col -->
               </div>
               <!-- /.row -->
               <div class="row">
                   <div class="col-md">
                       <div class="mb-3">
                           <label for="username" class="form-label">{{ __('label.username') }}
                               <span class="text-danger">*</span>
                           </label>
                           <input type="text" class="form-control @error('username') is-invalid @enderror"
                               id="username" name="username" value="{{ old('username') }}" required>
                           @error('username')
                               <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <div class="form-text">{{ __('label.username-help') }}</div>
                       </div>
                   </div>
                   <!-- /.col -->
                   <div class="col-md">
                       <div class="mb-3">
                           <label for="email" class="form-label">{{ __('label.email') }}
                               <span class="text-danger">*</span>
                           </label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" required>
                           @error('email')
                               <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <div class="form-text">{{ __('label.email-help') }}</div>
                       </div>
                   </div>
                   <!-- /.col -->
               </div>
               <!-- /.row -->

               <div class="row">
                   <div class="col-md">
                       <div class="mb-3">
                           <label for="password" class="form-label">{{ __('label.password') }}<span
                                   class="text-danger">*</span></label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" value="{{ old('password') }}" required>
                           @error('password')
                               <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <div class="form-text">{{ __('label.password-help') }}</div>
                       </div>

                   </div>
                   <!-- /.col-md -->
                   <div class="col-md">
                       <div class="mb-3">
                           <label for="password_confirmation"
                               class="form-label">{{ __('label.password-confirmation') }}<span
                                   class="text-danger">*</span></label>
                           <input type="password"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password_confirmation" name="password_confirmation"
                               value="{{ old('password_confirmation') }}" required>
                           @error('password_confirmation')
                               <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                           <div class="form-text">{{ __('label.password-confirmation-help') }}</div>
                       </div>
                   </div>
                   <!-- /.col-md -->
               </div>
               <!-- /.row -->

               <div class="d-flex justify-content-end align-items-center">
                   <button type="submit" class="btn btn-primary me-3">
                       <i class="bi bi-save"></i>
                       {{ __('label.save') }}
                   </button>
                   {{-- reset form --}}
                   <button type="reset" class="btn btn-secondary">
                       <i class="bi bi-arrow-counterclockwise"></i>
                       {{ __('label.reset') }}
                   </button>
               </div>
               <!-- /.d-flex -->
           </form>
       </div>
       <!-- /.card-body -->
   </div>
   <!-- /.card -->
