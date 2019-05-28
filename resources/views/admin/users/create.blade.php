@extends('layouts.metronic')
@section('title','Users')
@section('subtitle','Create new user')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="kt-portlet">

            <!--begin::Form-->
           <form class="kt-form" method="POST" action="{{ route('admin.users.store') }}">
                
                @csrf
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="form-group">
                            <label>{{ __('Full Name:') }}</label>
                            <input type="text" name="name"
                                class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"
                                placeholder="Enter name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ __('Please choose a username') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Email address:') }}</label>
                            <input type="email" name="email"
                                class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                                    <span class=" form-text
                                text-muted">{{ __('We\'ll never share your email with anyone else.') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="password ">{{ _('Password') }}</label>
                            <input type="password" name="password" class="form-control {{ ($errors->has('password'))
                                ? 'is-invalid' : '' }}" id="password" placeholder="Password"
                                aria-describedby="passwordHelpBlock">
                            <span class="form-text text-muted"> {{ __('Your password must be 8-20 characters long, contain
                                    letters and numbers, and must
                                    not contain spaces, special characters, or emoji.') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="groups">{{ __('Groups') }}</label>
                            <select multiple class="form-control" id="groups" name="groups[]"
                                size="{{ count($groups) }}">
                                @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                        <div class="form-group">
                                <label>{{ __('Notify user by email ?') }}</label>
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="notify"> {{ _('Yes, notify user') }}
                                        <span></span>
                                    </label>
                                   
                                </div>
                                <span class="form-text text-muted">{{  __('User will receveive an invitation mail to setup his account') }}</span>
                            </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">{{ __('Add user') }}</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script type="text/javascript">
// Class definition
var KTSelect2 = function() {
    // Private functions
    var demos = function() {

        // multi select
        $('#groups, #kt_select_groups_validate').select2({
            placeholder: "Select groups",
        });

       
    }

    // Public functions
    return {
        init: function() {
            demos();
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTSelect2.init();
});

</script>
    
@endsection