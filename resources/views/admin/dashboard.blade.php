@extends('layouts.metronic')
@section('title', 'Dashboard')
    

@section('content')
<div class="row">
    <div class="col-12">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Individual Training Compliance Status') }}</h3>
            </div>
            <div class="block-content">
                    <div id="chartdiv-users" class="amcharts"></div>
            </div>
        </div>
       
    </div>
</div>
<div class="row">
        <div class="col-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{ __('Training Compliance Status per Group') }}</h3>
                </div>
                <div class="block-content">
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
var chart = am4core.create("chartdiv-users", am4charts.XYChart);

// Export
chart.exporting.menu = new am4core.ExportMenu();

// Data for both series
var data = {!! $data_users !!};

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.renderer.labels.template.rotation = -45;
categoryAxis.tooltip.disabled = true;
categoryAxis.renderer.minHeight = 30;

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.max = 100;
valueAxis.title.text = "% of completion";

/* Create series */
var series = chart.series.push(new am4charts.ColumnSeries());
series.name = "Completion";
series.dataFields.valueY = "completion_percentage";
series.dataFields.categoryX = "name";

series.columns.template.tooltipText = "[#fff font-size: 15px]{categoryX}\n [/][#fff font-size: 20px]{valueY} %[/]"
series.columns.template.propertyFields.fillOpacity = "fillOpacity";
series.columns.template.propertyFields.stroke = "stroke";
series.columns.template.propertyFields.strokeWidth = "strokeWidth";
series.columns.template.propertyFields.strokeDasharray = "columnDash";
series.tooltip.label.textAlign = "middle";

// Draw the average line
var goal = valueAxis.axisRanges.create();
goal.value = {!! config('app.completion_goal') !!};
goal.grid.stroke = am4core.color("#2ADD87");
goal.grid.strokeWidth = 2;
goal.grid.strokeOpacity = 1;

goal.label.inside = true;
goal.label.text = "Goal";
goal.label.fill = goal.grid.stroke;
goal.label.verticalCenter = "bottom";

var average = valueAxis.axisRanges.create();
average.value = {!! $average_completion_users !!};
average.grid.stroke = am4core.color("#4E5257");
average.grid.strokeWidth = 2;
average.grid.strokeOpacity = 1;
average.grid.strokeDasharray = "2";
average.label.inside = true;
average.label.text = "Average ("+average.value+"%)";
average.label.fill = average.grid.stroke;
average.label.verticalCenter = "bottom";

chart.data = data;

/**
    Create chart instance for groups
*/ 
var chart_groups = am4core.create("chartdiv-groups", am4charts.XYChart);

// Export
chart_groups.exporting.menu = new am4core.ExportMenu();

// Data for both series
var data = {!! $data_groups !!};

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

chart_groups.data = data;

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