@extends('layouts.app')

@section('content')
<!-- Login -->
<section id="contact">
    <div class="container-fluid overlay vh-fix col-lg-12 coba">
        <div class="container coba d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card-contact mt-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="{{ asset('assets/image/logo_sportblaze.png') }}" class="img-logo">
                        <h2>SportBlaze</h2>
                        
                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control bg-color @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                            <label for="email" class="text-color">{{ __('Enter your email address') }}</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control bg-color @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="name@example.com">
                            <label for="password" class="text-color">{{ __('Enter your password') }}</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Login') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link d-block text-center" style="text-decoration: none;" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                        <a href="{{ route('register') }}" class="klik text-center no-underline" >{{ __("Don't have an account? Sign Up") }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
