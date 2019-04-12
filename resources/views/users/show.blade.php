@extends('layouts.backend') 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-4">
      <div class="block">
        <div class="block-header block-header-default">
          <h3 class="block-title">Profile</h3>
          <div class="block-options">
            <a href="{{ route('users.edit',['id' => $user->id]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>
          </div>
        </div>
        <div class="block-content block-content-full clearfix">
          <div class="text-right float-right mt-10">
            <div class="font-w600 mb-5">{{ $user->name }}</div>
            <div class="font-size-sm text-muted">{{ $user->email }}</div>

          </div>
          <div class="float-left">
            <img class="img-avatar" src="{{ $user->avatar }}" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="block">
          <div class="block-content block-content-full">
              <div class="py-20 text-center">
                  <div class="js-pie-chart pie-chart mb-20" data-percent="{{round(($user->trainings()->wherePivot('status', 1)->count()/$user->trainings()->count())*100,2) }}" data-line-width="4" data-size="100" data-bar-color="#9ccc65" data-track-color="#e9e9e9">
                 
                    <span>
                           {{ round(($user->trainings()->wherePivot('status', 1)->count()/$user->trainings()->count())*100,2) }}%
                      </span>
                  </div>
                  <div class="font-size-h3 font-w600">% of completion</div>
              </div>
          </div>
      </div>
    </div>
    <div class="col-4">
      <div class="block">
        <div class="block-header block-header-default">
          <h3 class="block-title">Groups</h3>
          <div class="block-options">
              <a href="{{ route('users.editGroups',['id' => $user->id]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>
          </div>
        </div>
        <div class="block-content">

          @foreach($user->groups as $group)
          <span class="badge badge-secondary h4">{{ $group->name }}</span>&nbsp; @endforeach

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="block block-bordered">
        <div class="block-content">

          <h3>Trainings ({{ $user->trainings->count() }})</h3>
          <!-- Trainings -->
          <table class="table table-striped table-sm">
            <thead>
              <tr class="thead-light">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Completion Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user->trainings as $training)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><a href="{{ route('trainings.user_training',['user' => $user->id,'training' => $training->id]) }}">{{ $training->name }}</a></td>
                <td class="text-center {{ ($training->pivot->status == 0 ) ? 'bg-warning' : 'bg-success' }}">{{ config('app.training_user_statuses.'.$training->pivot->status) }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($training->pivot->completion_date)->format('d-m-Y') }}</td>
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
@section('footer_scripts')
 <!-- Page JS Plugins -->
 <script src="{{ asset('assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
 <!-- Page JS Helpers (Easy Pie Chart Plugin) -->
 <script>jQuery(function(){ Codebase.helpers('easy-pie-chart'); });</script>

@endsection