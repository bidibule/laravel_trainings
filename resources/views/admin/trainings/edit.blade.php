@extends('layouts.metronic')
@section('title','Edit Training')
@section('subtitle',format_procedure_name($training))
@section('content')
<div class="row">
    <div class="col-8">
        <div class="kt-portlet">
           
            <div class="kt-portlet__body">
                <embed src="{{ Storage::url($training->path)}}" type="application/pdf" width="100%" height="800">
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="kt-portlet">
            <form class="kt-form" method="POST" action="/admin/trainings/{{ $training->id }}" enctype="multipart/form-data">
                <div class="kt-portlet__body">

                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="type">{{ __('Type') }}</label>
                        <select class="form-control" id="type" name="type">
                        
                        @foreach(config('app.training_types') as $key => $val)
                            <option value="{{ $key }}" {{ ($training->type == $key) ? 'selected' : '' }}>{{ $val }}</option>
                        @endforeach
                        </select>
    
                </div>
                <div class="form-group">
                    <label for="type">{{ __('Category') }}</label>
                    <select class="form-control" id="category" name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ ($training->category->id == $category->id) ? 'selected' : '' }}>0{{ $category->id.'-'.$category->name }}</option>
                    @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="type">{{ __('Version') }}</label>
                <select class="form-control" id="version" name="version">
                @for($i=1;$i<11;$i++)
                    <option value="{{ $i }}" {{ ($training->version == $i) ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
                </select>
        </div>
        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name"
                            class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"
                            placeholder="Enter name" value="{{ $training->name }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                            Please choose a name for this training. Name must be unique.
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="effective_date">{{ __('Effective Date') }}</label>
                        <input type="text" name="effective_date"
                            class="form-control {{ ($errors->has('effective_date')) ? 'is-invalid' : '' }}"
                            id="effective_date" aria-describedby="effective_dateHelp"
                            placeholder="Enter an effective date" value="{{ format_date($training->effective_date) }}">
                        <small id="effective_dateHelp" class="form-text text-muted">{{ __('Date format must be
                                dd/mm/YYYY') }}</small>

                        @if($errors->has('effective_date'))
                        <div class="invalid-feedback">
                            {{ __('Please choose an effective date for this training.') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select class="form-control" id="status" name="status">
                            @foreach(config('app.training_statuses') as $key => $val)
                            <option value="{{ $key }}" {{ ($training->status == $key) ? 'selected' : '' }}>{{ $val }}
                            </option>
                            @endforeach
                        </select>

                        @if($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ __('Please choose an status for this training.') }}
                        </div>
                        @endif
                    </div>
                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                    <div class="form-group">
                            <label><i class="la la-upload"></i>&nbsp;{{ __('Upload/Replace document')}} </label><br />
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file-training" name="file-training">
                                <label class="custom-file-label" for="customFile">{{ __('Choose a file') }}</label>
                                @if($errors->has('file_training'))
                                <div class="invalid-feedback">
                                    {{ __('Please choose a valid PDF file') }}
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection