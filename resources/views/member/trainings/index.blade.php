@extends('layouts.metronic') 
@section('title','My trainings') 
@section('content')

<div class="block">
  <ul class="nav nav-tabs nav-tabs-alt justify-content-end" data-toggle="tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="#tab-incomplete">Incomplete ({{ count($trainings_incompleted) }})</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#tab-complete">Complete ({{ count($trainings_completed) }})</a>
    </li>
  </ul>
  <div class="block-content tab-content">
    <div class="tab-pane fade show active" id="tab-incomplete" role="tabpanel">
      <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Effective Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trainings_incompleted as $training)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $training->name }}</td>
            <td>{{ $training->effective_date }}</td>
            <td>
              <h5><span class="badge badge-{{ ($training->pivot->status) ? 'success' : 'warning'  }}">{{ config('app.training_user_statuses.'.$training->pivot->status) }}</span></h5>
            </td>
            <td class="text-center ">
              <div class="btn-group ">
                <a href="{{ route( 'member.trainings.show',[ 'id'=> $training->id ]) }}">
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
    <div class="tab-pane fade show" id="tab-complete" role="tabpanel">
      <table class="table table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Effective Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trainings_completed as $training)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $training->name }}</td>
            <td>{{ $training->effective_date }}</td>
            <td class="text-center">
              <h5><span class="badge badge-{{ ($training->pivot->status) ? 'success' : 'warning'  }}">{{ config('app.training_user_statuses.'.$training->pivot->status) }}</span></h5>
            </td>
            <td class="text-center">
              <div class="btn-group ">
                <a href="{{ route( 'member.trainings.show',[ 'id'=> $training->id ]) }}">
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
@endsection