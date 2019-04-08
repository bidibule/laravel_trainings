@extends('layouts.admin')
@section('content')

<h2>List of trainings</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Effective Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($trainings as $training)
      <tr>
        <th scope="row">{{ $training->id }}</th>
        <td><a href="{{ route('trainings.edit',['id' => $training->id ]) }}">{{ $training->name }}</a></td>
        <td>{{ $training->effective_date }}</td>
        <td>{{ config('app.training_statuses.'.$training->status) }}</td>
        <td><a href="{{ route('trainings.edit',['id' => $training->id ]) }}">{{ __('edit') }}</a> - <a href="{{ route('trainings.show',['id' => $training->id ]) }}">{{ __('view') }}</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<a class="btn btn-primary" href="{{  route('trainings.create') }}" role="button">Add training</a>

@endsection