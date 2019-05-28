@extends('layouts.metronic') 
@section('title', __('Users'))
@section('subtitle', $user->name)
    

@section('content')

<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
    <!--Begin:: App Aside Mobile Toggle-->
    <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
        <i class="la la-close"></i>
    </button>
    <!--End:: App Aside Mobile Toggle-->

    <!--Begin:: App Aside-->
    <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" style="opacity: 1;">
        <!--begin:: Widgets/Applications/User/Profile4-->
<div class="kt-portlet kt-portlet--height-fluid-">
        <div class="kt-portlet kt-portlet--height-fluid-">
                <div class="kt-portlet__head kt-portlet__head--noborder">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
            
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('admin.users.edit',['id'=> $user->id]) }}" class="btn btn-clean btn-sm btn-bold" >
                            <i class="la la-pencil"></i>&nbsp;Update
                        </a>
                    
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--user-profile-2">
                        <div class="kt-widget__head">
                            <div class="kt-widget__media">
                                <img class="kt-widget__img kt-hidden-" src="{{ $user->avatar }}" alt="image">
                                <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                    
                                </div>
                            </div>
                            <div class="kt-widget__info">
                                <a href="#" class="kt-widget__username">
                                    {{ $user->name }}                                                 
                                </a>
                                <span class="kt-widget__desc">
                                   
                                </span>
                            </div>
                        </div>
            
                        <div class="kt-widget__body">
                            <div class="kt-widget__item">
                                <div class="kt-widget__contact">
                                    <span class="kt-widget__label">Email:</span>
                                    <a href="#" class="kt-widget__data ellipsis">{{ $user->email }}</a>
                                </div>
                                
                            </div>
                        </div>
            
                    </div>
                    <!--end::Widget -->
            
                  
                </div>
            </div>
</div>
<!--end:: Widgets/Applications/User/Profile4-->
         <!--Begin:: Portlet-->
         <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
						Groups
					</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('admin.users.editGroups',['id' => $user->id]) }}" class="btn btn-clean btn-sm btn-bold">
                        <i class="la la-pencil"></i> {{ __('Update') }}
                    </a>
                
                </div>
            </div>
            <div class="kt-portlet__body">
                    @foreach($user->groups as $group)
                    <span class="badge badge-secondary h4">{{ $group->name }}</span>&nbsp;
                    @endforeach

            </div>
        </div>
        <div class="kt-portlet">
                <div class="kt-widget14">
                    <div class="kt-widget14__header kt-margin-b-30">
                        <h3 class="kt-widget14__title">
                            {{ __('Individual compliance percentage') }}            
                        </h3>
                        <span class="kt-widget14__desc">
                            {{ __('Over all trainings available') }}
                        </span>
                    </div>
                    <div class="kt-widget14__chart" style="height:120px;">
                            <div id="chartdiv" class="amcharts"></div>
                    </div>
                </div>
            </div>
        <!--End:: Portlet-->
    </div>
    <!--End:: App Aside-->
    
    <!--Begin:: App Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
      
        <div class="row">
            <div class="col-md-12">
                    <div class="kt-portlet kt-portlet--tabs">
                            <div class="kt-portlet__head">
                              <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                  {{ __('Trainings') }}
                                </h3>
                              </div>
                              <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line nav-tabs-line-right nav-tabs-line-brand" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab-incomplete" role="tab">
                                          <i class="la la-warning"></i>
                                          {{ __('Incomplete') }} ({{ count($user->trainings_incompleted) }})
                                        </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-complete" role="tab"><i class="la la-check"></i> {{ __('Complete') }} ({{ count($user->trainings_completed) }})</a>
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
                                        <th scope="col">{{ __('Effective date') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($user->trainings_incompleted as $training)
                                      <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $training->name }}</td>
                                        <td>{{ format_date($training->effective_date) }}</td>
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
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Effective date') }}</th>
                                        <th scope="col">{{ __('Completion date') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($user->trainings_completed as $training)
                                      <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $training->name }}</td>
                                        <td>{{ format_date($training->effective_date) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($training->pivot->completion_date)->format('d-m-Y') }}</td>
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
            
        </div>   
    </div>
    <!--End:: App Content-->
</div>
@endsection
@section('footer_scripts')
<script src="{{ asset('assets/js/demo2/pages/custom/apps/user/profile.js') }}" type="text/javascript"></script>

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


