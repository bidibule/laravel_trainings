@extends('layouts.backend')
@section('title', 'Edit group - '.$group->name)
@section('content')

<div class="block">
    <div class="block-content">
        <form method="POST" action="/groups/{{ $group->id }}">
            @csrf
            @method('PATCH')
            <div class="form-group material">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{ $group->name }}" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name"  placeholder="Enter name" value="{{ old('name') }}">
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    Please choose a groupname
                </div>
                @endif
            </div>    
            
            <div class="form-group material">
                <label for="users">Users</label>
                <select multiple class="form-control" id="users" name="users[]">   

                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{  in_array($user->id, old('users', $group->users->pluck('id')->toArray())) ? 'selected' : ''  }}>{{ $user->name }}</option>          
                @endforeach 
                </select>
            </div>

            <div class="form-group material">

                        <label for="groups">Trainings</label>
                        <select multiple class="form-control" id="groups" name="trainings[]" size="15">   
                        @foreach($trainings as $training)
                            <option value="{{ $training->id }}" {{  in_array($training->id, old('trainings', $group->trainings->pluck('id')->toArray())) ? 'selected' : ''  }}>{{ $training->name }}</option>          
                        @endforeach 
                        </select>
                  
            </div>
            <button type="submit" class="btn btn-primary">Edit group</button>
        </form>
    </div>
</div>


@endsection

