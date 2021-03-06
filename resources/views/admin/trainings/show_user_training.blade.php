@extends('layouts.metronic') 
@section('title',$training->users->first()->name)
@section('content')
<div class="row">
  <div class="col-12">
      <div class="block">
          <div class="block-header block-header-default">
            <h3 class="block-title">{{ $training->name }}</h3><br/>
            <div class="block-options">
              <div class="block-options-item"><span class="badge badge-secondary">{{ config('app.training_statuses.'.$training->status) }}</span> @if($training->status == 2) ({{ $training->effective_date }}) @endif </div>
            </div>
          </div>
          <div class="block-content">
            <div class="form-group">
                <form METHOD="POST" id="update_training" action="{{ route( 'trainings.update_status',[ 'user_id'=> $training->pivot->user_id, 'training_id' => $training->pivot->training_id])}}"> @csrf @method('PATCH')
                <label class="css-control css-control-success css-switch">
                    <input type="checkbox" class="css-control-input" name="completed" id="completed" onclick="this.form.submit()" {{ ($training->pivot->status)
                      ? 'checked' : '' }}>
                    <span class="css-control-indicator"></span> {{ config('app.training_user_statuses.'.$training->pivot->status) }} {{ ($training->pivot->status) ? '('.$training->pivot->completion_date.')' :'' }} 
                </label>
              </form>
            </div>
      
          </div>
        </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
      <embed src="{{ asset('pdf/sample-sop.pdf')}}" type="application/pdf" width="100%" height="800">
          
  </div>
</div>

@endsection