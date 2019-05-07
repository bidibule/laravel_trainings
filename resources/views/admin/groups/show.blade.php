@extends('layouts.metronic')
@section('title','Groups')
@section('subtitle',$group->name)
@section('content')

<div class="row">
  <div class="col-lg-9">
      <div class="kt-portlet">
          <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
              <div class="kt-section__content">

            <h3>Trainings ({{ $group->trainings->count() }})</h3>
            <!-- Trainings -->
            <table class="table table-striped table-sm">
              <thead>
                <tr class="thead-light">
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($group->trainings as $training)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $training->name }}</td>
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

    <div class="row">
      <div class="col-9">
          <div class="kt-portlet">
              <div class="kt-portlet__body">
                <!--begin::Section-->
                <div class="kt-section">
                  <div class="kt-section__content">

            <h3>Users ({{ $group->users->count() }})</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr class="thead-light">
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach($group->users as $user)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $user->name }}</td>
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