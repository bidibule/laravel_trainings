@extends('layout.admin')
@section('content')

<h2>Edit user - {{ $user->name }}</h2>

<form method="POST" action="/users/{{ $user->id }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ old('name') }}">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            Please choose a username
        </div>
        @endif
    </div>    
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}"">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            Please choose a valide email Eg. john.doe@mydomain.com
        </div>
        @else
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control {{ ($errors->has('password')) ? 'is-invalid' : '' }}" id="password" placeholder="Password" aria-describedby="passwordHelpBlock">
        <small id="passwordHelpBlock" class="form-text text-muted" >
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </small>
    </div>
    <button type="submit" class="btn btn-primary">Edit user</button>
</form>


@endsection