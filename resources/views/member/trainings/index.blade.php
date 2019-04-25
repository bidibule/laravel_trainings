@extends('layouts.backend') 
@section('title','List of trainings ('.count($trainings).')') 
@section('content')

<div class="block">
  <div class="block-content">
  <table class="table table-striped">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Effective Date</th>
        <th scope="col">Status</th>
        <th scope="col">% Completion</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($trainings as $training)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $training->name }}</td>
        <td>{{ $training->effective_date }}</td>
        <td>{{ config('app.training_user_statuses.'.$training->pivot->status) }}</td>
        <td class="text-center">
          <div class="btn-group">
            <a href="{{ route('member.trainings.show',['id' => $training->id ]) }}">
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