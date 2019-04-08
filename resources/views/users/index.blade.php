@extends('layouts.admin')
@section('content')

<h2>List of users</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th>Action</th>
      </tr>
    </thead>ma
    <tbody>
    @foreach($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td><a href="{{ route('users.edit',['id' => $user->id]) }}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
        <td><a href="{{ route('users.edit',['id' => $user->id ]) }}">{{ __('edit') }}</a> - <a href="{{ route('users.show',['id' => $user->id ]) }}">{{ __('view') }}</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<a class="btn btn-primary" href="{{  route('users.create') }}" role="button">Add user</a>

@endsection