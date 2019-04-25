@extends('layouts.backend') 
@section('content')
<div class="block block-bordered">
    <div class="block-content">
        <form method="POST" action="{{ route('admin.trainings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name" placeholder="Enter name"
                    value="{{ old('name') }}"> @if($errors->has('name'))
                <div class="invalid-feedback">
                    Please choose a name for this training. Name must be unique.
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="effective_date">Effective Date</label>
                <input type="text" name="effective_date" class="form-control {{ ($errors->has('effective_date')) ? 'is-invalid' : '' }}"
                    id="effective_date" aria-describedby="effective_dateHelp" placeholder="Enter an effective date" value="{{ old('effective_date') }}">
                <small id="effective_dateHelp" class="form-text text-muted">Date format must be dd-mm-YYYY.  Eg. 12-05-2019</small> @if($errors->has('effective_date'))
                <div class="invalid-feedback">
                    Please choose an effective date for this training.
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
            @foreach(config('app.training_statuses') as $key => $val)
            <option value="{{ $key }}" {{ (old('status') == $key) ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
        </select> @if($errors->has('status'))
                <div class="invalid-feedback">
                    Please choose an status for this training.
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>{{ __('Associated PDF')}}</label>
                <input class="form-control" type="file" id="file-training" name="file-training">
                <small id="effective_dateHelp" class="form-text text-muted">{{ __('PDF only')}}</small>
                @if($errors->has('file_training'))
                <div class="invalid-feedback">
                    Please choose a valid PDF file
                </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add training</button>
            </div>
        </form>
    </div>
</div>
@endsection