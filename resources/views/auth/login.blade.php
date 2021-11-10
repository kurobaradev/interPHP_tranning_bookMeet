@extends('layouts.app')
@section('css')
<link href="{{ asset('vendors/admin/login/login.css') }}" rel="stylesheet" />

@endsection
@section('content')

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">{{ __('Login') }}</h2>
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="text-uppercase">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-uppercase">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" type="checkbox" name="remember"
                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <small>Remember Me</small>
                            </label>
                            <button type="submit" class="btn btn-login float-right"> {{ __('Login') }}</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                    </form>
                </div>
                <div class="col-md-8 banner-sec">
                    <div class="">
                        <img class="d-block img-fluid"
                            src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                                <h2>This is Heaven</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
