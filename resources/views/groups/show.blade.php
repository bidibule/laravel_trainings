@extends('layouts.backend') 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="block block-bordered">
        <div class="block-content">

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
                <td class="text-center">{{ config('app.training_statuses.'.$training->status) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
        <div class="col-12">
          <div class="block block-bordered">
            <div class="block-content">
    
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
@endsection
