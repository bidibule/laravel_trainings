@extends('layouts.backend')
@section('content')

<form method="POST" action="{{ route('trainings.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ old('name') }}">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            Please choose a name for this training.  Name must be unique.
        </div>
        @endif
    </div> 
    <div class="form-group">
        <label for="effective_date">Effective Date</label>
        <input type="text" name="effective_date" class="form-control {{ ($errors->has('effective_date')) ? 'is-invalid' : '' }}" id="effective_date" aria-describedby="effective_dateHelp"  placeholder="Enter an effective date" value="{{ old('effective_date') }}">
        <small id="effective_dateHelp" class="form-text text-muted">Date format must be dd/mm/YYYY</small>
        
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
            <option value="{{ $key }}" {{ (old('status') == $key) ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
        </select>
            
            @if($errors->has('status'))
            <div class="invalid-feedback">
                Please choose an status for this training.
            </div>
            @endif
    </div>     
    <button type="submit" class="btn btn-primary">Add training</button>
</form>

    
@endsection