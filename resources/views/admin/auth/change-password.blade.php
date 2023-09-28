   @extends('admin.layouts.layout')
   @section('content')
       <div class="content-wrapper">
           <div class="row">
               <div class="page-header">
                   <h3 class="page-title"> Change Password </h3>
                   <nav aria-label="breadcrumb">
                       {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol> --}}
                   </nav>
               </div>
               <div class="col-lg-12 grid-margin stretch-card">
                   <div class="card">
                       <div class="card-body">
                           @if (session('success'))
                               <div class="alert alert-success" role="alert">
                                   {{ session('success') }}
                               </div>
                           @endif

                           <form method="POST" action="{{ route('admin.change.password.update') }}">
                               @csrf

                               <div class="form-group">
                                   <label for="current_password">Current Password</label>
                                   <input id="current_password" type="password"
                                       class="form-control @error('current_password') is-invalid @enderror"
                                       name="current_password" required>

                                   @error('current_password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="new_password">New Password</label>
                                   <input id="new_password" type="password"
                                       class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                       required>

                                   @error('new_password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="new_password_confirmation">Confirm New Password</label>
                                   <input id="new_password_confirmation" type="password" class="form-control"
                                       name="new_password_confirmation" required>
                               </div>

                               <button type="submit" class="btn btn-primary">Change Password</button>
                           </form>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endsection
