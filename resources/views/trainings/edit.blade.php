@extends('layouts.backend')
@section('content')
<div class="block">
    <div class="block-content">
<form method="POST" action="/trainings/{{ $training->id }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ $training->name }}">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            Please choose a name for this training.  Name must be unique.
        </div>
        @endif
    </div> 
    <div class="form-group">
        <label for="effective_date">Effective Date</label>
        <input type="text" name="effective_date" class="form-control {{ ($errors->has('effective_date')) ? 'is-invalid' : '' }}" id="effective_date" aria-describedby="effective_dateHelp"  placeholder="Enter an effective date" value="{{ $training->effective_date }}">
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
            <option value="{{ $key }}" {{ ($training->status == $key) ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
        </select>
            
            @if($errors->has('status'))
            <div class="invalid-feedback">
                Please choose an status for this training.
            </div>
            @endif
    </div> 
     <!-- List of groups associated to it -->
    <div class="form-group">
        <label for="groups">Groups</label>
        <select multiple class="form-control" id="users" name="groups[]" size="{{ count($groups) }}">   

        @foreach($groups as $group)
            <option value="{{ $group->id }}" {{  in_array($group->id, old('groups', $training->groups->pluck('id')->toArray())) ? 'selected' : ''  }}>{{ $group->name }}</option>          
        @endforeach 
        </select>
    </div>      
    <div class="form-group">
            <label>{{ __('Associated PDF')}}</label>
            <p>{{ basename($training->path) }}
                
                <a href="{{ asset('storage/trainings/'.basename($training->path)) }}" target="_blank" title="Preview"><button type="button" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5">
                    <i class="fa fa-eye"></i>
                </button>
                </a>

            </a>
            </p>

            <input class="form-control" type="file" id="file-training" name="file-training">
            <small id="effective_dateHelp" class="form-text text-muted">{{ __('PDF only')}}</small>
            @if($errors->has('file_training'))
            <div class="invalid-feedback">
                Please choose a valid PDF file
            </div>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update training</button>
        </div>
</form>
</div>
    
@endsection