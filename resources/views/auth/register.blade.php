@extends('layouts.auth')

@section('content')
    <div class="col-lg-6">
        <div class="p-lg-5 p-4">
            <div>
                <h5 class="text-primary">Welcome to Cencadian's Online Portal!</h5>
                <p class="text-muted">Create an account or sign in to continue.</p>
            </div>

            @php $queryValue = request()->query('key'); @endphp

            @if(!$queryValue)
                <script>
                    window.location.href = "/";
                </script>
            @endif

            <div class="mt-4">
                @if($queryValue === 'intern')
                    <form id="registerForm" method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="border p-2 mb-3 text-center bg-dark-subtle">
                            <h4>Registering as {{ ucfirst($queryValue) }}</h4>
                        </div>

                        <input required type="hidden" name="type" value="{{ $queryValue }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Full Name') }}</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Name" id="name" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" id="email" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ __('Phone Number') }} (<small>(xxx xxx xxxx)</small>)</label>
                                    <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="*** *** ****" id="phone" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('Full Address') }}</label>
                                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter your full address" id="address" required autocomplete="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" id="password" required autocomplete="new-password" minlength="6">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Password" id="password-confirm" required autocomplete="new-password">
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">Sign Up</button>
                        </div>

                    </form>
                @else
                    <form id="registerForm" method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="border p-2 mb-3 text-center bg-dark-subtle">
                            <h4>Registering as {{ ucfirst($queryValue) }}</h4>
                        </div>

                        <input required type="hidden" name="type" value="{{ $queryValue }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Company Name') }}</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Name" id="name" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Company Email Address') }}</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" id="email" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ __('Company Phone Number') }}</label>
                                    <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter phone number" id="phone" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('Full Address') }}</label>
                                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter your full address" id="address" required autocomplete="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" id="password" required autocomplete="new-password" minlength="6">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Enter Password" id="password-confirm" required autocomplete="new-password">
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">Sign Up</button>
                        </div>

                    </form>
                @endif
            </div>

            <div class="mt-5 text-center">
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Sign in</a> </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('registerForm');
            const inputs = form.querySelectorAll('input');
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password-confirm');
            const phone = document.getElementById('phone');

            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                    }
                });
            });

            password.addEventListener('input', function() {
                if (password.value.length >= 6) {
                    password.classList.remove('is-invalid');
                    password.classList.add('is-valid');
                } else {
                    password.classList.remove('is-valid');
                    password.classList.add('is-invalid');
                }
            });

            passwordConfirm.addEventListener('input', function() {
                if (passwordConfirm.value === password.value) {
                    passwordConfirm.classList.remove('is-invalid');
                    passwordConfirm.classList.add('is-valid');
                } else {
                    passwordConfirm.classList.remove('is-valid');
                    passwordConfirm.classList.add('is-invalid');
                }
            });

            phone.addEventListener('input', function() {
                let cleaned = phone.value.replace(/\D/g, '');
                let formatted = cleaned;

                if (cleaned.length > 3) {
                    formatted = cleaned.slice(0, 3) + ' ' + cleaned.slice(3);
                }
                if (cleaned.length > 6) {
                    formatted = cleaned.slice(0, 3) + ' ' + cleaned.slice(3, 6) + ' ' + cleaned.slice(6, 10);
                }

                phone.value = formatted;
                if (cleaned.length === 10) {
                    phone.classList.remove('is-invalid');
                    phone.classList.add('is-valid');
                } else {
                    phone.classList.remove('is-valid');
                    phone.classList.add('is-invalid');
                }
            });
        });
    </script>
@endsection
