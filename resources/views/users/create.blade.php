@extends('layouts.backend')
@section('title','Create new user')
@section('content')
<div class="block">
    <div class="block-content">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-9">
                    <div class="form-material">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                            Please choose a username
                        </div>
                        @endif
                    </div>
                </div>
            </div>    
                <div class="form-group row">
                    <div class="col-md-9">
                        <div class="form-material">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}"">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                Please choose a valide email Eg. john.doe@mydomain.com
                            </div>
                            @else
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9">
                        <div class="form-material">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control {{ ($errors->has('password')) ? 'is-invalid' : '' }}" id="password" placeholder="Password" aria-describedby="passwordHelpBlock">
                            <small id="passwordHelpBlock" class="form-text text-muted" >
                                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                            </small>
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Add new user</button>
                </div>
            </div>
        </form>
    </div>
</div>

    
@endsection