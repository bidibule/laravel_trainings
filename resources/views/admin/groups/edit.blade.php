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
            <button type="submit" class="btn btn-primary">Edit group</button>
        </form>
    </div>
</div>


@endsection

