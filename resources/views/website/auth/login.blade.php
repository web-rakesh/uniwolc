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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="sub-login-content">
                                    <h4>Log In</h4>
                                </div>
                                <div class="sub-login-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                                                </div>
                                                <input type="text" class="form-control" name="email"
                                                    :value="old('email')" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                                </div>
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="sub-login-social-or">
                                    <span>or</span>
                                </div>

                                <div class="sub-login-social-main">

                                    <a class="sub-login-social-box" href="{{ url('auth/google') }}">
                                        <span><i class="fa-brands fa-google"></i></span>
                                        <p>Log In with Google</p>
                                    </a>
                                    <a class="sub-login-social-box" href="javascript:;">
                                        <span><i class="fa-brands fa-apple"></i></span>
                                        <p>Log In with Apple</p>
                                    </a>
                                    <a class="sub-login-social-box" href="{{ url('auth/facebook') }}">
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
