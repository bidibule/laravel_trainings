@extends('layouts.metronic')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon2-calendar-2"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        {{ __('Individual Training Compliance Status') }}
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body">
                <div id="chartdiv-individual" class="amcharts"></div>
            </div>


        </div>

    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon2-calendar-2"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        {{ __('Training Compliance Status per Group') }}
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body">
                <div id="chartdiv-groups" class="amcharts"></div>
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
<script>
    // Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

/**
    Create chart instance for users
*/ 
var chart_individual = am4core.create("chartdiv-individual", am4charts.XYChart);
// Export
chart_individual.exporting.menu = new am4core.ExportMenu();
chart_individual.data = {!! $data_users !!};
chart_individual.seriesContainer.zIndex = -1;

/* Create axes */
var categoryAxis_individual = chart_individual.xAxes.push(new am4charts.CategoryAxis());
categoryAxis_individual.dataFields.category = "name";
categoryAxis_individual.renderer.grid.template.location = 0;
categoryAxis_individual.renderer.minGridDistance = 20;
categoryAxis_individual.renderer.labels.template.horizontalCenter = "right";
categoryAxis_individual.renderer.labels.template.verticalCenter = "middle";
categoryAxis_individual.renderer.labels.template.rotation = -45;
categoryAxis_individual.tooltip.disabled = true;
categoryAxis_individual.renderer.minHeight = 30;

/* Create value axis */
var valueAxis_individual = chart_individual.yAxes.push(new am4charts.ValueAxis());
valueAxis_individual.min = 0;
valueAxis_individual.max = 100;
valueAxis_individual.title.text = "% of completion";

/* Create series */
var series_individual = chart_individual.series.push(new am4charts.ColumnSeries());
series_individual.name = "Completion";
series_individual.dataFields.valueY = "completion_percentage";
series_individual.dataFields.categoryX = "name";

series_individual.columns.template.tooltipText = "[#fff font-size: 15px]{categoryX}\n [/][#fff font-size: 20px]{valueY} %[/]";
series_individual.columns.template.fill = am4core.color("#82ccdd");
series_individual.columns.template.propertyFields.fillOpacity = "fillOpacity";
series_individual.columns.template.propertyFields.stroke = "stroke";
series_individual.columns.template.propertyFields.strokeWidth = "strokeWidth";
series_individual.columns.template.propertyFields.strokeDasharray = "columnDash";
series_individual.tooltip.label.textAlign = "middle";

// Getting a specific value for the user column
series_individual.columns.template.adapter.add("fill", function(fill, target) {
  if (target.dataItem && (target.dataItem.categoryX == "{!! auth()->user()->name!!}")) {
    return am4core.color("#3c6382");
  }
  else {
    return fill;
  }
});

// Draw the Average and Goal lines
var goal_individual = valueAxis_individual.axisRanges.create();
goal_individual.value = {!! config('app.completion_goal') !!};
goal_individual.grid.stroke = am4core.color("#2ADD87");
goal_individual.grid.strokeWidth = 2;
goal_individual.grid.strokeOpacity = 1;

goal_individual.label.inside = true;
goal_individual.label.text = "Goal";
goal_individual.label.fill = goal_individual.grid.stroke;
goal_individual.label.verticalCenter = "bottom";

var average_individual = valueAxis_individual.axisRanges.create();
average_individual.value = {!! $average_completion_users !!};
average_individual.grid.stroke = am4core.color("#4E5257");
average_individual.grid.strokeWidth = 2;
average_individual.grid.strokeOpacity = 1;
average_individual.grid.strokeDasharray = "2";
average_individual.label.inside = true;
average_individual.label.text = "Average ("+average_individual.value+"%)";
average_individual.label.fill = average_individual.grid.stroke;
average_individual.label.verticalCenter = "bottom";



/**
    Create chart instance for groups
*/ 
var chart_groups = am4core.create("chartdiv-groups", am4charts.XYChart);
chart_groups.exporting.menu = new am4core.ExportMenu();
chart_groups.data = {!! $data_groups !!};
chart_groups.seriesContainer.zIndex = -1;

/* Create axes */
var categoryAxis_groups = chart_groups.xAxes.push(new am4charts.CategoryAxis());
categoryAxis_groups.dataFields.category = "name";
categoryAxis_groups.renderer.grid.template.location = 0;
categoryAxis_groups.renderer.minGridDistance = 20;
categoryAxis_groups.renderer.labels.template.horizontalCenter = "right";
categoryAxis_groups.renderer.labels.template.verticalCenter = "middle";
categoryAxis_groups.renderer.labels.template.rotation = -45;
categoryAxis_groups.tooltip.disabled = true;
categoryAxis_groups.renderer.minHeight = 0;

/* Create value axis */
var valueAxis_groups = chart_groups.yAxes.push(new am4charts.ValueAxis());
valueAxis_groups.min = 0;
valueAxis_groups.max = 100;
valueAxis_groups.title.text = "% of completion";

/* Create series */
var series_groups = chart_groups.series.push(new am4charts.ColumnSeries());
series_groups.name = "Completion";
series_groups.dataFields.valueY = "completion_percentage";
series_groups.dataFields.categoryX = "name";

series_groups.columns.template.tooltipText = "[#fff font-size: 15px]{categoryX}\n [/][#fff font-size: 20px]{valueY} %[/]"
series_groups.columns.template.propertyFields.fillOpacity = "fillOpacity";
series_groups.columns.template.fill = am4core.color("#82ccdd");
series_groups.columns.template.propertyFields.stroke = "stroke";
series_groups.columns.template.propertyFields.strokeWidth = "strokeWidth";
series_groups.columns.template.propertyFields.strokeDasharray = "columnDash";
series_groups.tooltip.label.textAlign = "middle";

// Draw the average line
var goal_groups = valueAxis_groups.axisRanges.create();
goal_groups.value = {!! config('app.completion_goal') !!};
goal_groups.grid.stroke = am4core.color("#2ADD87");
goal_groups.grid.strokeWidth = 2;
goal_groups.grid.strokeOpacity = 1;

goal_groups.label.inside = true;
goal_groups.label.text = "Goal";
goal_groups.label.fill = goal_groups.grid.stroke;
goal_groups.label.verticalCenter = "bottom";

var average_groups = valueAxis_groups.axisRanges.create();
average_groups.value = {!! $average_completion_groups !!};
average_groups.grid.stroke = am4core.color("#4E5257");
average_groups.grid.strokeWidth = 2;
average_groups.grid.strokeOpacity = 1;
average_groups.grid.strokeDasharray = "2";
average_groups.label.inside = true;
average_groups.label.text = "Average ("+average_groups.value+"%)";
average_groups.label.fill = average_groups.grid.stroke;
average_groups.label.verticalCenter = "bottom";



</script>
@endsection

@section('header_css')
<style>
    .amcharts {
        width: 100%;
        height: 500px;
    }
</style>
@endsection