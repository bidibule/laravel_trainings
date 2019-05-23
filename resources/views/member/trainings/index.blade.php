@extends('layouts.metronic') 
@section('title','My trainings ('.($trainings_completed->count()+$trainings_incompleted->count()).')') 
@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                   
                  </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                  <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line nav-tabs-line-right nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#tab-incomplete" role="tab">
                            <i class="la la-warning"></i>
                            {{ __('Incomplete') }} ({{ count($trainings_incompleted) }})
                          </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#tab-complete" role="tab"><i class="la la-check"></i> {{ __('Complete') }} ({{ count($trainings_completed) }})</a>
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
                      <th scope="col">Name</th>
                      <th scope="col">Effective Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trainings_incompleted as $training)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $training->name }}</td>
                      <td>{{ $training->effective_date }}</td>
                      <td>
                        <h5><span class="badge badge-{{ ($training->pivot->status) ? 'success' : 'warning'  }}">{{ config('app.training_user_statuses.'.$training->pivot->status) }}</span></h5>
                      </td>
                      <td>
                        <div class="btn-group ">
                          <a href="{{ route( 'member.trainings.show',[ 'id'=> $training->id ]) }}">
                                  <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="{{ __('View') }}">
                                            <i class="fa fa-eye"></i>
                                          </button>
                                  </a>
                        </div>
                      </td>
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
                      <th scope="col">Name</th>
                      <th scope="col">Effective Date</th>
                      <th scope="col">Completion Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trainings_completed as $training)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $training->name }}</td>
                      <td>{{ $training->effective_date }}</td>
                      <td>{{ format_date($training->pivot->completion_date) }}</td>
                      <td>
                        <h5><span class="badge badge-{{ ($training->pivot->status) ? 'success' : 'warning'  }}">{{ config('app.training_user_statuses.'.$training->pivot->status) }}</span></h5>
                      </td>
                      <td>
                        <div class="btn-group ">
                          <a href="{{ route( 'member.trainings.show',[ 'id'=> $training->id ]) }}">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="{{ __('View') }}">
                                  <i class="fa fa-eye"></i>
                                </button>
                                </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  <div class="col-lg-3">
    <div class="kt-portlet kt-portlet-mobile">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            {{ __('Individual % of compliance')}}
          </h3>
        </div>
      </div>
      <div class="kt-portlet__body">
        <div id="chartdiv" class="amcharts"></div>
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
label.text = "{{ $compliance_percentage }}%";

var hand = chart.hands.push(new am4charts.ClockHand());
hand.showValue({{ round($compliance_percentage) }});


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