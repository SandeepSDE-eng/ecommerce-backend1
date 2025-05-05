@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-50 bg-light">
    <div class="row w-100 justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card shadow-lg border-0 rounded-3 position-relative overflow-hidden">
                <!-- Left Curved Side -->
                <div class="curved-side left-side position-absolute top-0 start-0 bottom-0"></div>

                <div class="card-body p-4 mt-50">
                    <h2 class="text-center mb-4 text-primary">Welcome Back</h2>
                    <h5 class="text-center mb-3">Please login to your account</h5>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Login') }}</button>
                        </div>

                        <!-- Forgot Password Link -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Right Curved Side -->
            <div class="curved-side right-side position-absolute top-0 end-0 bottom-0"></div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Curved sides */
    .curved-side {
        background-color: #007bff;
        width: 40%;
        height: 100%;
        z-index: -1;
    }

    /* Left side curved corner */
    .left-side {
        border-top-left-radius: 50% 40%;
        border-bottom-left-radius: 50% 40%;
    }

    /* Right side curved corner */
    .right-side {
        border-top-right-radius: 50% 40%;
        border-bottom-right-radius: 50% 40%;
    }

    /* Card styling */
    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    /* Minor adjustments to spacing */
    .card-body {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .card-body .form-label {
        font-weight: 500;
    }

    .d-grid {
        margin-top: 1.5rem;
    }
</style>
@endsection
