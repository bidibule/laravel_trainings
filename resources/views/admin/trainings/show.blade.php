@extends('layouts.backend') 
@section('content')
<div class="row">
  <div class="col-6">
    <div class="block">
      <div class="block-header block-header-default">
        <h3 class="block-title">{{ $training->name }}</h3>
        <div class="block-options">
          <a href="{{ route('admin.trainings.edit',['id' => $training->id]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>
        </div>
      </div>
      <div class="block-content block-content-full clearfix">
        <div class="mt-10">
          <div class="font-size-sm text-muted">Effective date: {{ $training->effective_date }}</div>
          <div class="font-size-sm text-muted">
            @switch($training->status) @case(0)
              <span class="badge badge-secondary">{{ config('app.training_statuses.'.$training->status) }}</span> @break @case(1)
              <span class="badge badge-dark">{{ config('app.training_statuses.'.$training->status) }}</span> @break @case(2)
              <span class="badge badge-info">{{ config('app.training_statuses.'.$training->status) }}</span> @break @case(3)
              <span class="badge badge-success">{{ config('app.training_statuses.'.$training->status) }}</span> @break 
            @endswitch       
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="block">
      <div class="block-content block-content-full">
        <div class="text-center">
          <div class="js-pie-chart pie-chart mb-10" data-percent="{{round(($training->users()->wherePivot('status', 1)->count()/$training->users()->count())*100,2) }}"
            data-line-width="4" data-size="100" data-bar-color="#9ccc65" data-track-color="#e9e9e9">

            <span>
                               {{ round(($training->users()->wherePivot('status', 1)->count()/$training->users()->count())*100,2) }}%
                          </span>
          </div>
          <div class="font-size-h5 font-w600">completion</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-3">
    <div class="block">
      <div class="block-header block-header-default">
        <h3 class="block-title">Groups</h3>
        <div class="block-options">
          <a href="{{ route('admin.trainings.editGroups',['id' => $training->id]) }}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>
        </div>
      </div>
      <div class="block-content">

        @foreach($training->groups as $group)
        <span class="badge badge-secondary h4">{{ $group->name }}</span>&nbsp; @endforeach

      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-12">
    <div class="block">
      <div class="block-content">
        <table class="table table-striped">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">{{ __('Name') }}</th>
              <th scope="col">{{ __('Status') }}</th>
              <th scope="col">{{ __('Date of completion') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($training->users as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->name }}</a>
              </td>
              <td><span class="badge {{ $user->pivot->status ? 'badge-success' : 'badge-warning'}} ">{{ config('app.training_user_statuses.'.$user->pivot->status)}}</span>                </td>
              <td>{{ ($user->pivot->status) ? $user->pivot->completion_date :'-' }}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
</div>
@endsection
 
@section('footer_scripts')
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_blocks_widgets_stats.min.js')}}"></script>
    <!-- Page JS Helpers (Easy Pie Chart Plugin) -->
    <script>jQuery(function(){ Codebase.helpers('easy-pie-chart'); });</script>
@endsection