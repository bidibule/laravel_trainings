@extends('layouts.auth') 
@section('title','Reset password') 
@section('content')
<form class="js-validation-reminder" action="{{ route('password.update') }}" method="POST">
    @csrf 
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="block block-themed block-rounded block-shadow">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title">{{ __('Set new password') }}</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="form-group row">
                <div class="col-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

        </div>
        <div class="block-content bg-body-light">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-alt-primary">
                    <i class="fa fa-user text-muted mr-5"></i> {{ __('Reset password') }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection