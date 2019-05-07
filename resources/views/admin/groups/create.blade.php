@extends('layouts.metronic')
@section('title', 'Create group')
@section('content')
<div class="row">
<div class="col-lg-6">
    <div class="kt-portlet">
        <form method="POST" action="{{ route('admin.groups.store') }}">
            @csrf
            <div class="kt-portlet__body">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" name="name"
                            class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"
                            placeholder="Enter name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                    <div class="invalid-feedback">
                            {{ __('Please choose a name for this group. Name must be unique.') }}
                    </div>
                    @endif
                </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">{{ __('Add group') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection