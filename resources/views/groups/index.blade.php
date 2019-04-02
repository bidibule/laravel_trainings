@extends('layout.admin')
@section('content')

<h2>List of groups</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">Name</th>

      </tr>
    </thead>
    <tbody>
    @foreach($groups as $group)
      <tr>
        <th scope="row">{{ $group->id }}</th>
        <td>{{ $group->name }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<a class="btn btn-primary" href="{{  route('groups.create') }}" role="button">Add group</a>

@endsection