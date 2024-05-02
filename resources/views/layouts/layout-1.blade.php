@extends('layouts.main-app')

@section('main-body')
<div class="wrapper" id="main-app">
	<!-- Navbar -->
	@section('header')
		@include('layouts.header')
	@show
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	@section('main-sidebar')
		@include('layouts.sidebar')
	@show

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- main content -->
		@yield('main-content')
	</div>
	<!-- /.content-wrapper -->

	<!-- footer-->
	@section('main-footer')
		@include('layouts.footer')
	@show
</div>
<!-- ./wrapper -->
@endsection