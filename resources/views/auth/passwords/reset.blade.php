@extends('layouts.auth')
@section('title','Reset password')
@section('content')

<!--begin::Body-->
<div class="kt-login__body">
    <!--begin::Request password-->
    <div class="kt-login__form">
        <div class="kt-login__title">
            <h3>{{ __('Set new password') }}</h3>
        </div>
        <!--begin::Form-->
        <form class="js-validation-reminder" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ $email ?? old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <!--begin::Action-->
            <div class="kt-login__actions">

                <button id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary"
                    type="submit">{{ __('Reset password') }}</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
</div>

@endsection