@extends('layouts.layout-1')

@section('head-title', 'Dashboard')

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Dashboard 
					<!-- <button class="btn btn-xs btn-primary btn-click">Click</button> -->
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12 col-md-4 col-lg-4">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-cogs mr-1"></i>
							Services
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0" style="max-height: 400px;">
						<table class="table table-bordered table-head-fixed">
							<thead>
								<tr>
									<th>Service Title</th>
									<th style="width: 50px;">Average</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Immunize</td>
									<td class="imm-avg">----</td>
								</tr>
								<tr>
									<td>Prenatal</td>
									<td class="pre-avg">----</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1">
						<i class="fas fa-baby"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Total Children</span>
						<span class="info-box-number child-total">----</span>
					</div>
				</div>

				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1">
						<i class="fas fa-female"></i>
					</span>

					<div class="info-box-content">
						<span class="info-box-text">Total Mother</span>
						<span class="info-box-number mother-total">----</span>
					</div>
				</div>


				<div class="card card-outline card-success">
					<div class="card-header">
						<h3 class="card-title">Immunize Donut</h3>
					</div>
					<div class="card-body">
						<canvas id="immunizeDonutChart" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
					</div>
					<!-- /.card-body -->
				</div>


				<div class="card card-outline card-success">
					<div class="card-header">
						<h3 class="card-title">Prenatal Donut</h3>
					</div>
					<div class="card-body">
						<canvas id="prenatalDonutChart" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
					</div>
					<!-- /.card-body -->
				</div>


			</div>

			<div class="col-sm-12 col-md-8 col-lg-8">

				<div class="card bg-gradient-success">
					<div class="card-header border-0">
						<h3 class="card-title">
							<i class="fas fa-baby mr-1"></i>
							Immunize Monitoring Chart
						</h3>

						<div class="card-tools">
							<!-- <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
								<i class="fas fa-times"></i>
							</button> -->
						</div>
					</div>
					<div class="card-body">
						<canvas class="chart" id="immunize-chart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;">
						</canvas>
					</div>

				</div>


				<div class="card bg-gradient-danger">
					<div class="card-header border-0">
						<h3 class="card-title">
							<i class="fas fa-baby mr-1"></i>
							Prenatal Monitoring Chart
						</h3>

						<div class="card-tools">
							<!-- <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
								<i class="fas fa-times"></i>
							</button> -->
						</div>
					</div>
					<div class="card-body">
						<canvas class="chart" id="prenatal-chart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;">
						</canvas>
					</div>

				</div>

			</div>
		</div>
		<!-- /.row -->
	</div>
</section>
@endsection


@section('script-file')
<!-- ChartJS -->
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {

		const chartOptions = {
			maintainAspectRatio : false,
			responsive : true,
			legend: {
				display: false,
			},
			scales: {
				xAxes: [{
					ticks : {
						fontColor: '#efefef',
					},
					gridLines : {
						display : false,
						color: '#efefef',
						drawBorder: false,
					}
				}],
				yAxes: [{
					ticks : {
	          // stepSize: 5000,
	          fontColor: '#efefef',
	        },
	        gridLines : {
	        	display : true,
	        	color: '#efefef',
	        	drawBorder: false,
	        }
	      }]
	    }
	  }

	  const donutOptions     = {
	  	maintainAspectRatio : false,
	  	responsive : true,
	  }

	  const immunizeChart = function(label, data) {
			var immunizeChartCanvas = $('#immunize-chart').get(0).getContext('2d');

			var immunizeChartData = {
				labels  : label, // ['2010', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020'],
				datasets: [
				{
					label               : 'Immunize',
					fill                : false,
					borderWidth         : 2,
					lineTension         : 0,
					spanGaps : true,
					borderColor         : '#efefef',
					pointRadius         : 3,
					pointHoverRadius    : 7,
					pointColor          : '#efefef',
					pointBackgroundColor: '#efefef',
					data                : data, // [10, 45, 30, 39, 50, 45, 75, 120, 500, 30]
				}
				]
			}
			var immunizeGraphChart = new Chart(immunizeChartCanvas, { 
			  	type: 'line', 
			  	data: immunizeChartData, 
			  	options: chartOptions
			  }
		  )
		}



		const prenatalChart = function(label, data) {
			var prenatalChartCanvas = $('#prenatal-chart').get(0).getContext('2d');

			var prenatalChartData = {
				labels  : label, // ['2010', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020'],
				datasets: [
				{
					label               : 'Prenatal',
					fill                : false,
					borderWidth         : 2,
					lineTension         : 0,
					spanGaps : true,
					borderColor         : '#efefef',
					pointRadius         : 3,
					pointHoverRadius    : 7,
					pointColor          : '#efefef',
					pointBackgroundColor: '#efefef',
					data                : data, // [100, 50, 30, 36, 20, 80, 75, 120, 100, 70]
				}
				]
			}

			var prenatalGraphChart = new Chart(prenatalChartCanvas, { 
			  	type: 'line', 
			  	data: prenatalChartData, 
			  	options: chartOptions
			  }
		  )
		}



	  // Donut chart here
	  const immunizeDonutChart = function(data) {
		  var immunizeDonut = $('#immunizeDonutChart').get(0).getContext('2d')
		  var immunizeDonutData = {
		  	labels: [
		  	'Under Monitoring', 
		  	'Graduate',
		  	],
		  	datasets: [
		  	{
		  		data: data,
		  		backgroundColor : ['#f56954', '#00a65a'],
		  	}
		  	]
		  }
		  var donutChart = new Chart(immunizeDonut, {
	    	type: 'doughnut',
	    	data: immunizeDonutData,
	    	options: donutOptions      
	    })
		}

		const prenatalDonutChart = function(data) {
		  var prenatalDonut = $('#prenatalDonutChart').get(0).getContext('2d')
		  var prenatalDonutData = {
		  	labels: [
		  	'Under Monitoring', 
		  	'Complete',
		  	],
		  	datasets: [
		  	{
		  		data: data,
		  		backgroundColor : ['#f56954', '#00a65a'],
		  	}
		  	]
		  }
		  var donutChart = new Chart(prenatalDonut, {
	    	type: 'doughnut',
	    	data: prenatalDonutData,
	    	options: donutOptions      
	    })
		}

		// $(document).on('click', '.btn-click', function(e) {
		// 	Dashboard.get();
		// })

    const Dashboard = {
			get: function() {
				$.loading.show({title: 'Loading...'});
				$.ajax({
					method: 'POST',
					url: "{{ route('user.dashboard.data') }}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {},
					success: function(resp) {
						console.log(resp);
						if (resp.statusCode===200) {
							$('.child-total').text(resp.child);
							$('.mother-total').text(resp.mother);
							$('.imm-avg').text(resp.immunize+' %');
							$('.pre-avg').text(resp.prenatal+' %');
							immunizeChart(resp.immunizeChart.label, resp.immunizeChart.data);
							prenatalChart(resp.prenatalChart.label, resp.prenatalChart.data);
							immunizeDonutChart(resp.immunizeDonut);
							prenatalDonutChart(resp.prenatalDonut);
						}
						$.loading.hide();
					},
					error: function(err) {
						$.loading.hide();
						console.log(err);
					}
				});
				
			}
		}

		Dashboard.get();

  })
</script>
@endsection