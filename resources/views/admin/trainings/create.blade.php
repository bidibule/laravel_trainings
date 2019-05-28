@extends('layouts.metronic') 
@section('title', 'Create training')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="kt-portlet">
                <div class="kt-portlet__body">
        <form method="POST" action="{{ route('admin.trainings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                    <label for="type">{{ __('Type') }}</label>
                    <select class="form-control" id="type" name="type">
                    
                    @foreach(config('app.training_types') as $key => $val)
                        <option value="{{ $key }}" {{ (old('type') == $key) ? 'selected' : '' }}>{{ $val }}</option>
                    @endforeach
                    </select>

            </div>
            <div class="form-group">
                <label for="type">{{ __('Category') }}</label>
                <select class="form-control" id="category" name="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category') == $category->id) ? 'selected' : '' }}>0{{ $category->id.'-'.$category->name }}</option>
                @endforeach
                </select>
        </div>
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" name="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name" placeholder="Enter name"
                    value="{{ old('name') }}"> @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ __('Please choose a name for this training. Name must be unique.') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="effective_date">{{ __('Effective date') }}</label>
                <input type="text" name="effective_date" class="form-control {{ ($errors->has('effective_date')) ? 'is-invalid' : '' }}"
                    id="effective_date" aria-describedby="effective_dateHelp" placeholder="Enter an effective date" value="{{ old('effective_date') }}">
                <small id="effective_dateHelp" class="form-text text-muted">{{ __('Date format must be dd-mm-YYYY.  Eg. 12-05-2019') }}</small> @if($errors->has('effective_date'))
                <div class="invalid-feedback">
                    {{ __('Please choose an effective date for this training.') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="status">{{ __('Status') }}</label>
                <select class="form-control" id="status" name="status">
            @foreach(config('app.training_statuses') as $key => $val)
            <option value="{{ $key }}" {{ (old('status') == $key) ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
        </select> @if($errors->has('status'))
                <div class="invalid-feedback">
                    {{ __('Please choose an status for this training.') }}
                </div>
                @endif
            </div>
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
            <div class="form-group">
                <label>{{ __('Associated PDF')}}</label>
                <input class="form-control" type="file" id="file-training" name="file-training">
                <small id="effective_dateHelp" class="form-text text-muted">{{ __('PDF only')}}</small>
                @if($errors->has('file_training'))
                <div class="invalid-feedback">
                    {{ __('Please choose a valid PDF file') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Add training') }}</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection