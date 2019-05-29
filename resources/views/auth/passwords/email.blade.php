@extends('layouts.auth')
@section('title', 'Login')
@section('content')

<!--begin::Body-->
<div class="kt-login__body">
    <!--begin::Request password-->
    <div class="kt-login__form">
        <div class="kt-login__title">
            <h3>{{ __('Request new password') }}</h3>
        </div>
        <!--begin::Form-->
        <form class="js-validation-reminder" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span> @endif
            </div>
            <!--begin::Action-->
            <div class="kt-login__actions">

                <button id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
</div>
@endsection