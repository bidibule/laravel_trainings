@extends('layouts.metronic')
@section('title', 'Training details')
@section('subtitle', $training->name)
@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="kt-portlet kt-portlet--height-fluid">
      <div class="kt-portlet__body">
        <div class="kt-portlet__content">
          <embed src="{{ asset('pdf/sample-sop.pdf')}}" type="application/pdf" width="100%" height="600">
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
       {{ __('Effective date: ').$training->effective_date }}
      </div>
    </div>
    <!-- end portlet -->
   
  </div>
</div>

@endsection