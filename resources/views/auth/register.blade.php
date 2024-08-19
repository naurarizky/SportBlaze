@extends('layouts.app')

@section('content')
<!-- Register -->
<section id="contact">
    <div class="container-fluid overlay vh-fix">
        <div class="d-flex align-items-center justify-content-center container coba">
            <div class="col-md-6">
                <div class="card-contacct mt-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <img src="{{ asset('assets/image/logo_sportblaze.png') }}" class="img-logo">
                        <h2>SportBlaze</h2>

                        <div class="form-floating mb-3">
                            <input id="name" type="text" class="form-control bg-color @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
                            <label for="name" class="text-color">{{ __('Enter your username') }}</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control bg-color @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                            <label for="email" class="text-color">{{ __('Enter your email address') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control bg-color @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            <label for="password" class="text-color">{{ __('Enter your password') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password-confirm" type="password" class="form-control bg-color" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            <label for="password-confirm" class="text-color">{{ __('Confirm your password') }}</label>
                        </div>

                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <a href="{{ route('login') }}" class="klik text-center">{{ __('Already have an account? Login') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
