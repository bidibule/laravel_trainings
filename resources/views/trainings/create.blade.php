@extends('layout.admin')
@section('content')

<form method="POST" action="{{ route('trainings.store') }}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ old('name') }}">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            Please choose a name for this training.  Name must be unique.
        </div>
        @endif
    </div> 
    <div class="form-group">
            <label for="exampleInputEmail1">Effective Date</label>
            <input type="text" name="effective_date" class="form-control {{ ($errors->has('effective_date')) ? 'is-invalid' : '' }}" id="effective_date"  placeholder="Enter an effective_date" value="{{ old('effective_date') }}">
            @if($errors->has('effective_date'))
            <div class="invalid-feedback">
                Please choose an effective date for this training.
            </div>
            @endif
    </div> 
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status">
            <option value="1">Draft</option>
            <option value="2">Obsolete</option>
            <option value="3">Effective & Empty</option>
            <option value="4">Effective & Filled</option>
            <option value="5">Approved</option>
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