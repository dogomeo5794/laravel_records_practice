@extends('layouts.layout-1')

@section('head-title', 'Admin | SMS Logs')

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">
					<button class="btn btn-xs btn-danger" onclick="javascript:window.history.back()">
						<i class="fas fa-arrow-left"></i> Back
					</button> 
					SMS Logs
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Settings</a></li>
					<li class="breadcrumb-item active">SMS Logs</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				@if (empty($data['file']))
					<h3>No data found!</h3>
				@else
					<h5>Upload On: {{ $data['lastModified'] }}</h5>
					<h5>File Size: {{ round($data['size'] / 1024) }} KB</h5>
					<pre>{{ $data['file'] }}</pre>
				@endif
			</div>
		</div>
		<!-- /.row -->
	</div>
</section>
@endsection

@section('script-code')
<script type="text/javascript">
	
</script>
@endsection