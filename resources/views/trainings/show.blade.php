@extends('layouts.backend') 
@section('content')
<div class="block block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title">{{ $training->name }} @switch($training->status)
            @case(0)
              <span class="badge badge-secondary">{{ config('app.training_statuses.'.$training->status) }}</span>
              @break
            @case(1)
              <span class="badge badge-dark">{{ config('app.training_statuses.'.$training->status) }}</span>
              @break
            @case(2)
              <span class="badge badge-info">{{ config('app.training_statuses.'.$training->status) }}</span>
              @break
            @case(3)
              <span class="badge badge-success">{{ config('app.training_statuses.'.$training->status) }}</span>
              @break
            @endswitch</h3>
        <div class="block-options">
            <div class="block-options-item">
                {{ $training->total_completion_percentage }} %
              </div>
        </div>
    </div>
  
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
          <td><span class="badge {{ $user->pivot->status ? 'badge-success' : 'badge-warning'}} ">{{ config('app.training_user_statuses.'.$user->pivot->status)}}</span> </td>
          <td>{{ ($user->pivot->status) ? $user->pivot->completion_date :'-' }}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
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