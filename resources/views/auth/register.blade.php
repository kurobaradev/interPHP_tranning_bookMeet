@extends('layouts.app')
@section('css')
    <link href="{{ asset('vendors/admin/login/login.css') }}" rel="stylesheet" />
@endsection
@section('js')
<script>
    $.ajax({
        // urk api get ticket/id
        url: '/api/department',
        type: 'GET',
        success: function(data) {
            data.forEach(element => {
                // <option value="">PHP</option>
                console.log(element.id);
                $("#department_id").append("<option value='"+element.id+"'>"+element.name+"</option>");
            });

        }
    });
</script>
@endsection
@section('content')

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">{{ __('Register') }}</h2>
                    <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-uppercase">{{ __('Name') }}</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department_id" class="text-uppercase">{{ __('email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="department_id" class="text-uppercase">{{ __('Department') }}</label>
                            <select id="department_id" class="form-control @error('department_id') is-invalid @enderror"
                                    name="department_id" value="{{ old('department_id') }}" required
                                    autocomplete="department_id" autofocus>

                                {{-- <option value="1">PHP</option> --}}
                            </select>

                            @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-uppercase">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="text-uppercase">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                                required>
                        </div>


                        <button type="submit" class="btn btn-login">{{ __('Register') }}</button>
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
