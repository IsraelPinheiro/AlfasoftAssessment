@extends('layouts.auth')
@section('title-complement', ' - Login')
@section('content')
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Welcome Back!') }}</h1>
    </div>
    <form class="user" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control form-control-user @error('password') is-invalid @enderror"  placeholder="{{ __('Password') }}" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>
        <hr>
        @if (Route::has('password.request'))
        <div class="text-center">
            <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password ?') }}</a>
        </div>
        @endif
        @if (Route::has('register'))
            <div class="text-center">
                <a class="small" href="{{ route('register') }}">{{ __('Create an Account !') }}</a>
            </div>
        @endif
    </form>
@endsection