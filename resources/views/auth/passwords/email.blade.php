@extends('layouts.auth') 
@section('title','Reset password') 
@section('content')
<form class="js-validation-reminder" action="{{ route('password.email') }}" method="POST">
    @csrf @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="block block-themed block-rounded block-shadow">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title">Password Reminder</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="form-group row">
                <div class="col-12">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                        required> @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif
                </div>
            </div>

        </div>
        <div class="block-content bg-body-light">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-alt-primary">
                    <i class="fa fa-user text-muted mr-5"></i> {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection