@extends('layouts.backend') 
@section('title','Edit group for '.$user->name) 
@section('content')
<div class="block">
    <div class="block-content">
        <form method="POST" action="/users/{{ $user->id }}/groups">
            @csrf 
            @method('PATCH')
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="form-material">
                        <label for="groups">Groups</label>
                        <select multiple class="form-control" id="groups" name="groups[]">   
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{  in_array($group->id, old('groups', $user->groups->pluck('id')->toArray())) ? 'selected' : ''  }}>{{ $group->name }}</option>          
                        @endforeach 
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-alt-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection