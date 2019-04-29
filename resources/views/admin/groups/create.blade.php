@extends('layouts.metronic')
@section('content')

<form method="POST" action="{{ route('admin.groups.store') }}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ old('name') }}">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            Please choose a name for this group.  Name must be unique.
        </div>
        @endif
    </div>    
    <button type="submit" class="btn btn-primary">Add new group</button>
</form>

    
@endsection