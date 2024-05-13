@extends('layouts.auth')

@section('content')
    <div class="col-lg-6">
        <div class="p-lg-5 p-4">
            <div>
                <h5 class="text-primary">Welcome Back !</h5>
                <p class="text-muted">Sign in to continue to {{ env('APP_NAME') }}.</p>
            </div>

            <div class="mt-4">
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" id="email" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        @if (Route::has('password.request'))
                            <div class="float-end">
                                <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                            </div>
                        @endif

                        <label class="form-label" for="password-input">{{ __('Password') }}</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                            <input name="password" type="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" placeholder="Enter password" id="password" required autocomplete="current-password">
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success w-100" type="submit">Sign In</button>
                    </div>

{{--                    <div class="mt-4 text-center">--}}
{{--                        <div class="signin-other-title">--}}
{{--                            <h5 class="fs-13 mb-4 title">Sign In with</h5>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>--}}
{{--                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>--}}
{{--                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>--}}
{{--                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </form>
            </div>

            <div class="mt-5 text-center">
                <p class="mb-0">Don't have an account ?<br>
                    <a href="{{ route('register', 'key=company') }}" class="float-start fw-semibold text-primary text-decoration-underline"> Signup as Company</a>
                    <a href="{{ route('register', 'key=intern') }}" class="float-end fw-semibold text-primary text-decoration-underline"> Signup as Intern</a>
                </p>
            </div>
        </div>
    </div>
@endsection
