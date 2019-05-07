@extends('layouts.metronic')
@section('title','Edit user')
@section('subtitle',$user->name)
@section('content')
<div class="row">


</div>
<div class="row">
    <div class="col-lg-8">
        <form class="kt-form" method="POST" action="{{ route('admin.users.update',['id' => $user->id]) }}">
            @csrf
            @method('PATCH')
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="form-group">
                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
                                    <div class="kt-avatar__holder" style="background-image: url('{{ $user->avatar }}');"></div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                    </div>

                    <div class="form-group">
                            <label for="name">{{ ('Name') }}</label>
                            <input type="text" name="name" value="{{ $user->name }}"
                                class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"
                                placeholder="Enter name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ __('Please choose a username') }}
                            </div>
                            @endif
                    </div>
                    <div class="form-group ">
                        <label for="email">{{ __('Email address') }}</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
                            value="{{ old('email') }}"">
                    @if($errors->has('name'))
                    <div class=" invalid-feedback">
                        {{ __('Please choose a valide email Eg. john.doe@mydomain.com') }}
                    </div>
                    @else
                    <span class=" form-text
                text-muted">{{ __('We\'ll never share your email with anyone else.') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password"
                        class="form-control {{ ($errors->has('password')) ? 'is-invalid' : '' }}" id="password"
                        placeholder="enter a password" aria-describedby="passwordHelpBlock">
                    <span class=" form-text
                text-muted">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                        spaces, special
                        characters, or emoji.
                    </span>

                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">{{ __('Edit user') }}</button>
                </div>
            </div>

    </div>
    </form>
</div>
</div>
@endsection