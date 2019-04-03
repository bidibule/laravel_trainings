@extends('layout.admin')
@section('content')

<h2>Edit group - {{ $group->name }}</h2>

<form method="POST" action="/groups/{{ $group->id }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" value="{{ $group->name }}" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ old('name') }}">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            Please choose a groupname
        </div>
        @endif
    </div>    
    
    <div class="form-group">
        <label for="users">Users</label>
        <select multiple class="form-control" id="users" name="users[]">   

        @foreach($users as $user)
            <option value="{{ $user->id }}" {{  in_array($user->id, old('groups', $user->groups->pluck('id')->toArray())) ? 'selected' : ''  }}>{{ $user->name }}</option>          
        @endforeach 
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Edit group</button>
</form>


@endsection

