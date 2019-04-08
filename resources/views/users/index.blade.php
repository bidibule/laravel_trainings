@extends('layouts.backend') 
@section('title',__('List of users ('.count($users).')')) 
@section('content')
<div class="block">
  <div class="block-header block-header-default">
    <h3 class="block-title">&nbsp;</h3>
    <div class="block-options">
      <a href="{{  route('users.create') }}"><button type="button" class="btn btn-sm btn-secondary">Add user</button></a>

    </div>
  </div>
  <div class="block-content">
    <table class="table table-striped">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td><a href="{{ route('users.edit',['id' => $user->id]) }}">{{ $user->name }}</a></td>
          <td>{{ $user->email }}</td>
          <td class="text-center">
            <div class="btn-group">
              <a href="{{ route('users.edit',['id' => $user->id ]) }}">
                  <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="{{ __('Edit') }}">
                      <i class="fa fa-pencil"></i>
                  </button></a>
              <a href="{{ route('users.show',['id' => $user->id ]) }}"><button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="{{ __('View') }}">
                      <i class="fa fa-times"></i>
                  </button></a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection