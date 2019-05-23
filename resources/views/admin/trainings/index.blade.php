@extends('layouts.metronic') 
@section('title','Trainings ('.count($trainings).')') 
@section('content')
<div class="row">
    <div class="col-lg-12">
  
      <div class="kt-portlet">
        <div class="kt-portlet__body">
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
        <td><a href="{{ route('admin.trainings.show',['id' => $training->id ]) }}">{{ format_procedure_name($training) }}</a></td>
        <td>{{ format_date($training->effective_date) }}</td>
        <td>{{ config('app.training_statuses.'.$training->status) }}</td>

        <td>{{ ($training->users->count() >0) ? round((($training->users()->wherePivot('status', 1)->count() / $training->users->count())*100),2).'%' : '-' }}</td>
          </td>
        <td class="text-center">
          <div class="btn-group">
            <a href="{{ route('admin.trainings.show',['id' => $training->id ]) }}">
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
</div>
</div>
@endsection