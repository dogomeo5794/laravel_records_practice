@extends('layouts.layout-1')

@section('head-title', 'Admin | Dashboard')

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Admin Dashboard</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dasboard</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-info elevation-1">
						<i class="fas fa-user-cog"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Total Admin</span>
						<span class="info-box-number">{{ $admin }}</span>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-info elevation-1">
						<i class="fas fa-users"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Total Users</span>
						<span class="info-box-number">{{ $user }}</span>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-success elevation-1">
						<i class="fas fa-check"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Total Active</span>
						<span class="info-box-number">{{ $active }}</span>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1">
						<i class="fas fa-ban"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Total Deactive</span>
						<span class="info-box-number">{{ $deactive }}</span>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
</section>
@endsection