@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <!--begin::Body-->
    <div class="kt-login__body">

            <!--begin::Signin-->
            <div class="kt-login__form">
                <div class="kt-login__title">
                    <h3>Sign In</h3>
                </div>

                <!--begin::Form-->
                <form class="kt-form" action="{{ route('login') }}" method="POST">
                        @csrf
                    <div class="form-group">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="off" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span> @endif
                    </div>
                    <div class="form-group">
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span> @endif
                    </div>
                    <!--begin::Action-->
                    <div class="kt-login__actions">
                        <a href="{{ route('password.request') }}" class="kt-link kt-login__link-forgot">
                            Forgot Password ?
                        </a>
                        <button id="kt_login_signin_submit"
                            class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In</button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->

  
            </div>
            <!--end::Signin-->
        </div>
        <!--end::Body-->
@endsection