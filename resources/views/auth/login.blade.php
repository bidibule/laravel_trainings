@extends('layouts.auth') 
@section('title','Login') 
@section('content')
<form class="js-validation-signin" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="block block-themed block-rounded block-shadow">
        <div class="block-header bg-gd-dusk">
            <h3 class="block-title">Please Sign In</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                                                    <i class="si si-wrench"></i>
                                                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="form-group row">
                <div class="col-12">
                    <label for="login-username">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                        required autofocus> @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span> @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="login-password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required> @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span> @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-sm-6 d-sm-flex align-items-center push">
                    <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                    </div>
                </div>
                <div class="col-sm-6 text-sm-right push">
                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="si si-login mr-10"></i> Sign In
                                                    </button>
                </div>
            </div>
        </div>
        <div class="block-content bg-body-light">
            <div class="form-group text-center">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a> @endif
            </div>
        </div>
    </div>
</form>
@endsection