@extends('backend.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">

	<h1>Dashboard</h1>

	<ol class="breadcrumb">
		
		<li class="active">

			<i class="fa fa-dashboard"></i> Dashboard

		</li>
	
	</ol>

</section>

<!-- Main content -->
<section class="content container-fluid">

	<div class="row">

		<div class="col-md-3 col-sm-6 col-xs-12">

			<div class="info-box">

				<span class="info-box-icon bg-aqua">

					<i class="ion ion-ios-gear-outline"></i>

				</span>

				<div class="info-box-content">

					<span class="info-box-text">CPU Traffic</span>

					<span class="info-box-number">90<small>%</small></span>

				</div>

			</div>

		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">

			<div class="info-box">

				<span class="info-box-icon bg-red">

					<i class="ion ion-ios-pricetag-outline"></i>

				</span>

				<div class="info-box-content">

					<span class="info-box-text">Products</span>

					<span class="info-box-number">{{ $items }}</span>

				</div>

			</div>

		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">

			<div class="info-box">

				<span class="info-box-icon bg-green">

					<i class="ion ion-ios-cart-outline"></i>

				</span>

				<div class="info-box-content">

					<span class="info-box-text">Sales</span>

					<span class="info-box-number">760</span>

				</div>

			</div>

		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">

			<div class="info-box">

				<span class="info-box-icon bg-yellow">

					<i class="ion ion-ios-people-outline"></i>

				</span>

				<div class="info-box-content">

					<span class="info-box-text">New Orders</span>

					<span class="info-box-number">39</span>

				</div>

			</div>

		</div>

	</div>

	<div class="row">
		
		<div class="col-md-8">
			
			<div class="box box-default">
			
				<div class="box-header with-border">
			
					<h3 class="box-title">Item Categories</h3>

					<div class="box-tools pull-right">
			
						<button type="button" class="btn btn-box-tool" data-widget="collapse">

							<i class="fa fa-minus"></i>
			
						</button>
			
						<button type="button" class="btn btn-box-tool" data-widget="remove">

							<i class="fa fa-times"></i>
						</button>
			
					</div>
			
				</div>
			
				<div class="box-body">
			
					<div class="row">
			
						<div class="col-md-8">
			
							<div class="chart-responsive">
			
								<canvas id="pieChart" height="250"></canvas>
			
							</div>
			
						</div>
			
						<div class="col-md-4">
				
							<ul class="chart-legend clearfix">
								
								@foreach($categories_count as $key => $value)
								<li>

									<i class="fa fa-circle-o" style="color: {{$value['color']}}"></i> {{$key}}

								</li>

								@endforeach
							
							</ul>
						
						</div>
					
					</div>
				
				</div>

			</div>

		</div>

		<div class="col-md-4">

			@foreach($location_count as $key => $value)
		
			<div class="info-box bg-{{ $value['class'] }}">
		
				<span class="info-box-icon">

					<i class="ion ion-ios-location-outline"></i>

				</span>

				<div class="info-box-content">
				
					<span class="info-box-text">Location: {{ $key }}</span>
				
					<span class="info-box-number">{{ $value["count"] }}</span>

					<div class="progress">
				
						<div class="progress-bar" style="width: {{ $value['percent'] }}%"></div>
				
					</div>
				
					<span class="progress-description">{{ $value['percent'] }}% increase at location code: {{ $key }}</span>
				
				</div>
				
			</div>

			@endforeach

		</div>

	</div>

	<div class="row">

		<div class="col-md-12">

			<div class="box">

				<div class="box-header with-border">

					<h3 class="box-title">Monthly Report</h3>

					<div class="box-tools pull-right">

						<button type="button" class="btn btn-box-tool" data-widget="collapse">

							<i class="fa fa-minus"></i>

						</button>

						<button type="button" class="btn btn-box-tool" data-widget="remove">

							<i class="fa fa-times"></i>

						</button>

					</div>

				</div>

				<div class="box-body">

					<div class="row">

						<div class="col-md-10 col-md-offset-1">

							<div class="chart">

								<!-- Sales Chart Canvas -->
								<canvas id="salesChart" style="height: 250px;"></canvas>

							</div>

						</div>

					</div>

				</div>

				<div class="box-footer">
					
					<div class="row">

						@foreach($entry_count as $type => $count)
				
						<div class="col-sm-4 col-xs-12">
				
							<div class="description-block border-right">
						
								<span class="description-percentage text-green">

									<i class="fa fa-caret-up"></i> {{ mt_rand(10, 40) }}%

								</span>
							
								<h5 class="description-header">{{ $count }}</h5>
				
								<span class="description-text">TOTAL {{ $type }}</span>
				
							</div>
						
						</div>
				
						@endforeach
						
					</div>
				
				</div>

			</div>

		</div>

	</div>

</section>

<script type="text/javascript">
	
	$(document).ready(function(){

		var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
		
		var salesChart       = new Chart(salesChartCanvas);

		var salesChartData = {
			
			labels  : [ @for($i = 0; $i < count($posting_dates); $i++)'{{ Carbon\Carbon::createFromFormat('m-d-Y', $posting_dates[$i]->posting_date)->format('d-m') }}',@endfor ],
			datasets: [
				@foreach($post_count as $key => $pc)
				{
					label: '{{ $key }}',
					data: [
						@foreach($pc as $c)'{{ $c }}',@endforeach
					],
					@if($key == "Transfer")
					fillColor           : 'rgb(210, 214, 222)',
					strokeColor         : 'rgb(210, 214, 222)',
					pointColor          : 'rgb(210, 214, 222)',
					pointStrokeColor    : '#c1c7d1',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: 'rgb(220,220,220)',
					@elseif($key == "Output")
					fillColor           : 'rgba(60,141,188,0.9)',
					strokeColor         : 'rgba(60,141,188,0.8)',
					pointColor          : '#3b8bba',
					pointStrokeColor    : 'rgba(60,141,188,1)',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					@elseif($key == "Consuption")
					fillColor           : 'rgb(210, 214, 222)',
					strokeColor         : 'rgb(210, 214, 222)',
					pointColor          : 'rgb(210, 214, 222)',
					pointStrokeColor    : '#c1c7d1',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: 'rgb(220,220,220)',
					@endif
				},
				@endforeach
		]
		};

		var salesChartOptions = {
		// Boolean - If we should show the scale at all
		showScale               : true,
		// Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines      : false,
		// String - Colour of the grid lines
		scaleGridLineColor      : 'rgba(0,0,0,.05)',
		// Number - Width of the grid lines
		scaleGridLineWidth      : 1,
		// Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,
		// Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines  : true,
		// Boolean - Whether the line is curved between points
		bezierCurve             : true,
		// Number - Tension of the bezier curve between points
		bezierCurveTension      : 0.3,
		// Boolean - Whether to show a dot for each point
		pointDot                : false,
		// Number - Radius of each point dot in pixels
		pointDotRadius          : 4,
		// Number - Pixel width of point dot stroke
		pointDotStrokeWidth     : 1,
		// Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		pointHitDetectionRadius : 20,
		// Boolean - Whether to show a stroke for datasets
		datasetStroke           : true,
		// Number - Pixel width of dataset stroke
		datasetStrokeWidth      : 2,
		// Boolean - Whether to fill the dataset with a color
		datasetFill             : true,
		// String - A legend template
		legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
		// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		maintainAspectRatio     : true,
		// Boolean - whether to make the chart responsive to window resizing
		responsive              : true
		};

		// Create the line chart
		salesChart.Line(salesChartData, salesChartOptions);

		// ---------------------------
		// - END MONTHLY SALES CHART -
		// ---------------------------

	});

	var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
    @foreach($categories_count as $key => $value)
    {
      value    : '{{$value['count']}}',
      color    : '{{$value['color']}}',
      highlight: '{{$value['color']}}',
      label    : '{{$key}}'
    },
    @endforeach
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> items'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);

</script>

@endsection