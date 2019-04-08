@extends('layouts.backend')
@section('content')
    <label for="name">Name: </label>
    <p>{{ $training->name }}</p>
    <label for="name">Status of the SOP: </label>
    <p>{{ $training->status }}</p>
    <label for="name">Status of completion: </label>
    <form METHOD="POST" id="update_training" action={{ route('trainings.update_status',['user_id' => $training->pivot->user_id, 'training_id' => $training->pivot->training_id])}}>
      @csrf
      @method('PATCH')
        <div class="form-check">

          <input type="checkbox" class="form-check-input" name="completed" id="completed" onclick="this.form.submit()" {{ ($training->pivot->status) ? 'checked' : '' }}>
          <label class="form-check-label" for="complete">{{ config('app.training_user_statuses.'.$training->pivot->status) }} {{ ($training->pivot->status) ? '('.$training->pivot->completion_date.')' :'' }}</label>
        </div>
      </form>
    
    <embed src="{{ asset('pdf/sample-sop.pdf')}}" type="application/pdf" width="100%" height="800">
    
  @endsection