@extends('layouts.metronic') 
@section('title','Trainings')
@section('subtitle',$training->name)
@section('content')

<div class="row">
  <div class="col-3">
      <div class="kt-portlet">
          <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
          Groups
        </h3>
              </div>
              <div class="kt-portlet__head-toolbar">
                  <a href="{{ route('admin.trainings.editGroups',['id' => $training->id]) }}" class="btn btn-clean btn-sm btn-bold">
                      <i class="la la-pencil"></i> Update
                  </a>
              
              </div>
          </div>
          <div class="kt-portlet__body">
                  @foreach($training->groups as $group)
                  <span class="badge badge-secondary h4">{{ $group->name }}</span>&nbsp;
                  @endforeach

          </div>
      </div>
      <div class="kt-portlet">
              <div class="kt-widget14">
                  <div class="kt-widget14__header kt-margin-b-30">
                      <h3 class="kt-widget14__title">
                          {{ __('Compliance percentage') }}            
                      </h3>
                      <span class="kt-widget14__desc">
                          {{ __('For all active users') }}
                      </span>
                  </div>
                  <div class="kt-widget14__chart" style="height:120px;">
                          <div id="chartdiv" class="amcharts"></div>
                  </div>
              </div>
          </div>
      <!--End:: Portlet-->

      </div>
  <div class="col-9">
      <div class="kt-portlet kt-portlet--tabs">
          <div class="kt-portlet__head">
              <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line nav-tabs-line-right nav-tabs-line-brand" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-incomplete" role="tab">
                          <i class="la la-warning"></i>
                          {{ __('Incomplete') }} ({{ count($training->users_incompleted) }})
                        </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-complete" role="tab"><i class="la la-check"></i> {{ __('Completed') }} ({{ count($training->users_completed) }})</a>
                  </li>
                </ul>
              </div>
            </div>
          <div class="kt-portlet__body">
              <div class="tab-content">
                  <div class="tab-pane active" id="tab-incomplete">
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
            @foreach($training->users_incompleted as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->name }}</a></td>
              <td><span class="badge {{ $user->pivot->status ? 'badge-success' : 'badge-warning'}} ">{{ config('app.training_user_statuses.'.$user->pivot->status)}}</span>                </td>
              <td>{{ ($user->pivot->status) ? format_date($user->pivot->completion_date) :'-' }}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="tab-pane " id="tab-complete">
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
                @foreach($training->users_completed as $user)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $user->name }}</a></td>
                  <td><span class="badge {{ $user->pivot->status ? 'badge-success' : 'badge-warning'}} ">{{ config('app.training_user_statuses.'.$user->pivot->status)}}</span>                </td>
                  <td>{{ ($user->pivot->status) ? format_date($user->pivot->completion_date) :'-' }}</td>
    
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
@section('footer_scripts')
 
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>

/** AMCHARTS **/
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// create chart
var chart = am4core.create("chartdiv", am4charts.GaugeChart);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

chart.innerRadius = -25;

var axis = chart.xAxes.push(new am4charts.ValueAxis());
axis.min = 0;
axis.max = 100;
axis.strictMinMax = true;
axis.renderer.grid.template.stroke = new am4core.InterfaceColorSet().getFor("background");
axis.renderer.grid.template.strokeOpacity = 0.3;

var colorSet = new am4core.ColorSet();

var range0 = axis.axisRanges.create();
range0.value = 0;
range0.endValue = 40;
range0.axisFill.fillOpacity = 1;
range0.axisFill.fill = am4core.color("#EF5350");
range0.axisFill.zIndex = - 1;

var range1 = axis.axisRanges.create();
range1.value = 40;
range1.endValue = 80;
range1.axisFill.fillOpacity = 1;
range1.axisFill.fill = am4core.color("#FFA726");
range1.axisFill.zIndex = -1;

var range2 = axis.axisRanges.create();
range2.value = 80;
range2.endValue = 100;
range2.axisFill.fillOpacity = 1;
range2.axisFill.fill = am4core.color("#66bb6a");
range2.axisFill.zIndex = -1;

var label = chart.radarContainer.createChild(am4core.Label);
label.isMeasured = false;
label.fontSize = 30;
label.x = am4core.percent(50);
label.y = am4core.percent(100);
label.horizontalCenter = "middle";
label.verticalCenter = "bottom";
label.text = "{{ $training->total_compliance_percentage }}%";

var hand = chart.hands.push(new am4charts.ClockHand());
hand.showValue({{ round($training->total_compliance_percentage) }});


});

</script>
@endsection
 
@section('header_css')
<style>
  .amcharts {
    width: 100%;
    height: 250;
  }
</style>
@endsection
