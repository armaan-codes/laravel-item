<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Booststrap -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

	<!-- Ionicons -->
	<link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">

	<!-- jVectorMap -->
	<link href="{{ asset('css/jquery-jvectormap.css') }}" rel="stylesheet">

	<!-- AdminLTE -->
	<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">

	<!-- AdminLTE Skins -->
	<link href="{{ asset('css/adminlte-skins.min.css') }}" rel="stylesheet">

	<!-- Custom Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- jQuery -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>

	<!-- Bootstrap -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	<!-- AdminLTE -->
	<script src="{{ asset('js/adminlte.min.js') }}"></script>

	<!-- AdminLTE -->
	<script src="{{ asset('js/chart.min.js') }}"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">

		@include('backend.layouts.header')

		@include('backend.layouts.sidebar')

		<div class="content-wrapper">

			@yield('content')

		</div>

		@include('backend.layouts.footer')

	</div>

	<!-- Custom Script -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>