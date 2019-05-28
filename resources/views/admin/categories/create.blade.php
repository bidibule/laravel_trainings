@extends('layouts.metronic')
@section('title', 'Create category')
@section('content')
<div class="row">
<div class="col-lg-6">
    <div class="kt-portlet">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name"
                                class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"
                                placeholder="{{ __('Enter name') }}" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                                {{ __('Please choose a name for this category. Name must be unique.') }}
                        </div>
                        @endif

                </div>
                <div class="form-group">
                        <label for="name">{{ __('Abbreviation') }}</label>
                        <input type="text" name="abbreviation"
                                class="form-control {{ ($errors->has('abbreviation')) ? 'is-invalid' : '' }}" id="abbreviation"
                                placeholder="{{ __('Enter abbreviation') }}" value="{{ old('abbreviation') }}">
                        @if($errors->has('abbreviation'))
                        <div class="invalid-feedback">
                                {{ __('Please choose an abbreviation for this category. Name must be unique.') }}
                        </div>
                        @endif

                </div>
                   
                </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">{{ __('Add category') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection