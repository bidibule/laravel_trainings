@extends('layouts.metronic')
@section('title','Edit Training')
@section('subtitle',$training->name)
@section('content')
<div class="row">
    <div class="col-8">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="la la-pdf"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Document
                    </h3>
                </div>
               
            </div>
            <div class="kt-portlet__body">
                <embed src="{{ asset('pdf/sample-sop.pdf')}}" type="application/pdf" width="100%" height="800">
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="kt-portlet">
            <form class="kt-form" method="POST" action="/trainings/{{ $training->id }}" enctype="multipart/form-data">
                <div class="kt-portlet__body">

                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
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
                        <label for="effective_date">Effective Date</label>
                        <input type="text" name="effective_date"
                            class="form-control {{ ($errors->has('effective_date')) ? 'is-invalid' : '' }}"
                            id="effective_date" aria-describedby="effective_dateHelp"
                            placeholder="Enter an effective date" value="{{ $training->effective_date }}">
                        <small id="effective_dateHelp" class="form-text text-muted">Date format must be
                            dd/mm/YYYY</small>

                        @if($errors->has('effective_date'))
                        <div class="invalid-feedback">
                            Please choose an effective date for this training.
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            @foreach(config('app.training_statuses') as $key => $val)
                            <option value="{{ $key }}" {{ ($training->status == $key) ? 'selected' : '' }}>{{ $val }}
                            </option>
                            @endforeach
                        </select>

                        @if($errors->has('status'))
                        <div class="invalid-feedback">
                            Please choose an status for this training.
                        </div>
                        @endif
                    </div>
                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                    <div class="form-group">
                            <label><i class="la la-upload"></i>&nbsp;{{ __('Upload/Replace document')}} </label><br />
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file-training" name="file-training">
                                <label class="custom-file-label" for="customFile">Choose a file</label>
                                @if($errors->has('file_training'))
                                <div class="invalid-feedback">
                                    Please choose a valid PDF file
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="reset" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection