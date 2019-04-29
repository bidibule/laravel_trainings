@extends('layouts.metronic')
@section('title','List of groups ('.count($groups).')') 
@section('content')

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">&nbsp;</h3>
        <div class="block-options">
          <a href="{{  route('admin.groups.create') }}"><button type="button" class="btn btn-sm btn-secondary">Add group</button></a>
        </div>
      </div>
      <div class="block-content">
  <table class="table table-striped">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    @foreach($groups as $group)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $group->name }}</td>
        <td>
            <div class="btn-group">
                <a href="{{ route('admin.groups.show',['id' => $group->id ]) }}">
                  <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="{{ __('View') }}">
                        <i class="fa fa-eye"></i>
                </button>
                </a>
              </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection