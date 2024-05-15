@extends('layouts.auth')

@section('content')
    <div class="col-lg-6">
        <div class="p-lg-5 p-4">
            <div>
                <h5 class="text-primary">Welcome to Cencadian's Online Portal!</h5>
                <p class="text-muted">Create an account or sign in to continue.</p>
            </div>

            @php $queryValue = request()->query('key');@endphp

            @if(!$queryValue)
                <script>
                    window.location.href = "/";
                </script>
            @endif

            <div class="mt-4">
                @if($queryValue === 'intern')
                    <form method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="border p-2 mb-3 text-center bg-dark-subtle">
                            <h4>Registering as {{ ucfirst($queryValue) }}</h4>
                        </div>

                        <input required type="hidden" name="type" value="{{ $queryValue }}">

                        <div class="row">
                            <div class="col-nmd-6">
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
                                    <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                                    <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter phone number" id="phone" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('Full Address') }}</label>
                                    <input name="address" type="tel" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter your full address" id="address" required autocomplete="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>
                                    <input name="dob" type="date" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" placeholder="Enter your DOB" id="dob" required autocomplete="dob">
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">{{ __('Gender') }}</label>
                                    <select required class="form-control" name="gender" id="gender">
                                        <option selected>-- Select Gender -- </option>
                                        <option value="male">Male </option>
                                        <option value="female">Female </option>
                                        <option value="others">Others </option>
                                    </select>
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                        </div>




                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter Password" id="password" required autocomplete="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password_confirmation" placeholder="Enter Password" id="password-confirm" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">Sign Up</button>
                        </div>

                    </form>
                @else
                    <form method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="border p-2 mb-3 text-center bg-dark-subtle">
                            <h4>Registering as {{ ucfirst($queryValue) }}</h4>
                        </div>

                        <input required type="hidden" name="type" value="{{ $queryValue }}">

                        <div class="row">
                            <div class="col-nmd-6">
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

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('Full Address') }}</label>
                                    <input name="address" type="tel" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter your full address" id="address" required autocomplete="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">{{ __('Gender') }}</label>
                                    <select required class="form-control" name="gender" id="gender">
                                        <option selected>-- Select Gender -- </option>
                                        <option value="male">Male </option>
                                        <option value="female">Female </option>
                                        <option value="others">Others </option>
                                    </select>
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                        </div>




                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter Password" id="password" required autocomplete="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password_confirmation" placeholder="Enter Password" id="password-confirm" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
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
@endsection
