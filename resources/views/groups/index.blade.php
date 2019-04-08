@extends('layouts.backend')
@section('title','List of groups ('.count($groups).')') 
@section('content')

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">&nbsp;</h3>
        <div class="block-options">
          <a href="{{  route('groups.create') }}"><button type="button" class="btn btn-sm btn-secondary">Add group</button></a>
        </div>
      </div>
      <div class="block-content">
  <table class="table table-striped">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Users</th>
      </tr>
    </thead>
    <tbody>
    @foreach($groups as $group)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td><a href="{{ route('groups.edit',['id' => $group->id]) }}"">{{ $group->name }}</a></td>
        <td>
          @foreach($group->users as $user)
          {{ $user->name }}<br/>
          @endforeach
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection