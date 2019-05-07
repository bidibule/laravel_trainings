@extends('layouts.metronic')
@section('title', 'Edit group')
@section('subtitle',$group->name)
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="kt-portlet">
            <form method="POST" action="{{ route('admin.groups.update',['id'=> $group->id])}}">
                @csrf
                @method('PATCH')
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('Name') }}</label>
                            <input type="text" name="name" value="{{ $group->name }}"
                                class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"
                                placeholder="Enter name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ __('Please choose a groupname') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">{{ __('Edit group') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection