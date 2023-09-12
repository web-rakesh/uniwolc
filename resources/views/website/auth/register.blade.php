@extends('website.layouts.layout')

@section('content')
    <!-- Login -->
    <section class="sub-login-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sub-login-welcome-text">
                        <h3>Welcome</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                            ut laoreet.</p>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="sub-login-white-bg">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="sub-login-content">
                                    <h4>Register</h4>
                                </div>

                                <div class="sub-login-form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" name="first_name"
                                                    value="{{ old('first_name') }}" placeholder="First Name">
                                                @error('first_name')
                                                    <span class="alert alert-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" name="last_name"
                                                    value="{{ old('last_name') }}" placeholder="Last Name">
                                                @error('last_name')
                                                    <span class="alert alert-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
                                                </div>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ old('email') }}" placeholder="Email">
                                                @error('email')
                                                    <span class="alert alert-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-globe"></i></div>
                                                </div>
                                                <select class="form-control" name="type" id="exampleFormControlSelect1">
                                                    <option value="student">Student</option>
                                                    <option value="education_partner">Education Partner</option>
                                                    <option value="recruitment_partner">Recruitments Partners</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                                </div>
                                                <input type="password" class="form-control" name="password" value=""
                                                    placeholder="Password">
                                                @error('password')
                                                    <span class="alert alert-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                                </div>
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    value="" placeholder="Confirm Password">

                                                @error('password_confirmation')
                                                    <span class="alert alert-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--  <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><img width="1.25rem"
                                                            src="assets/images/canada-contact.png" alt="" /></div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="+1 204-234-5678">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="form-check mt-4">
                                                <input type="checkbox" class="form-check-input"
                                                    {{ old('policy_check') ? 'checked' : '' }} name="policy_check"
                                                    id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">I have read and agree to
                                                    the Terms and Conditions and the Privacy and Cookies Policy*.</label>
                                            </div>
                                            @error('policy_check')
                                                <span class="alert alert-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-primary" type="submit">Create Account</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="sub-login-social-or">
                                    <span>or</span>
                                </div>

                                <div class="col-lg-12">
                                    <p class="sub-already-login-btn">Already have an account? <a
                                            href="{{ route('login') }}">Login</a></p>
                                </div>

                                <div class="sub-login-social-main">

                                    <a class="sub-login-social-box" href="javascript:;">
                                        <span><i class="fa-brands fa-google"></i></span>
                                        <p>Log In with Google</p>
                                    </a>
                                    <a class="sub-login-social-box" href="javascript:;">
                                        <span><i class="fa-brands fa-apple"></i></span>
                                        <p>Log In with Apple</p>
                                    </a>
                                    <a class="sub-login-social-box" href="javascript:;">
                                        <span><i class="fa-brands fa-facebook-f"></i></span>
                                        <p>Log In with Facebook</p>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Login End -->
@endsection
