@extends('layouts.metronic')
@section('title', 'Training details')
@section('subtitle', $training->name)
@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="kt-portlet kt-portlet--height-fluid">
      
      <div class="kt-portlet__body">
        <div class="kt-portlet__content">
          <embed src="{{ Storage::url($training->path)}}" type="application/pdf" width="100%" height="600">
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <!-- Begin portlet -->
    <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            Status <small>{{ config('app.training_statuses.'.$training->status) }}</small>
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
       {{ __('Effective date: ').format_date($training->effective_date) }}
      </div>
    </div>
    <!-- end portlet -->
   
  </div>
</div>
<!--  Modal box -->
<form METHOD="POST" id="update_training" action="{{ route( 'member.trainings.update_status',[ 'id'=> $training->id])}}">
    @csrf @method('PATCH')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Confirm') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>{{ __('I have read the procedure and fully agree with this procedure') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection