@extends('backend.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">

	<h1>Configuration</h1>

	<ol class="breadcrumb">

		<li class="active">

			<i class="fa fa-dashboard"></i> Canfiguration

		</li>

	</ol>

</section>

<!-- Main content -->
<section class="content container-fluid">

	<div class="row">
		
		<div class="col-md-12">
			
			<div class="box box-primary">
				
				<div class="box-header">

					<h3 class="box-title">Configure Limits</h3>

				</div>

				<div class="box-body">
					
					<div class="row">
						
						<div class="col-md-8 col-md-offset-2">
							
							<div class="col-xs-12" style="margin: 15px auto;">

								<p style="font-weight: 600;">Quantity:</p>

								<input type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="[0,700]" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">

							</div>

							<div class="col-xs-12" style="margin: 15px auto;">

								<p style="font-weight: 600;">Items:</p>

								<input type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="[0,250]" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">

							</div>

							<div class="col-xs-12" style="margin: 15px auto;">

								<p style="font-weight: 600;">Location:</p>

								<input type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="[0,400]" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="aqua">

							</div>

							<div class="col-xs-12" style="margin: 15px auto;">

								<p style="font-weight: 600;">Consumption:</p>

								<input type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="[0,600]" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">

							</div>

							<div class="col-xs-12" style="margin: 15px auto; text-align: center;">

								<button class="btn btn btn-info">Save</button>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>

<script type="text/javascript">
	
	$(document).ready(function() {

		$('.slider').slider();

	});

</script>

@endsection