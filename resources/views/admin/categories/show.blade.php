@extends('layouts.metronic')
@section('title','Groups')
@section('subtitle',$category->name)
@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="kt-portlet">
      <div class="kt-portlet__body">
        <!--begin::Section-->
        <div class="kt-section">
          <div class="kt-section__content">
            <h3>{{ __('Trainings') }} ({{ $category->trainings->count() }})</h3>
            <!-- Trainings -->
            <table class="table table-striped table-sm">
              <thead>
                <tr class="thead-light">
                  <th scope="col">#</th>
                  <th scope="col">{{ __('Name') }}</th>
                  <th scope="col">{{ __('Status') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($category->trainings as $training)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ format_procedure_name($training) }}</td>
                  <td>{{ config('app.training_statuses.'.$training->status) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection