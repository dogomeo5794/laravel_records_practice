@extends('layouts.layout-1')

@section('head-title', 'Reports')

@section('css-code')
<style type="text/css">
	.r1>input:first-child+input[type=hidden]+label, .r1>input:first-child+label {
    border: 1px solid #D3CFC8;
    border-radius: 0;
    margin-left: -29px;
    padding: 15px;
    background: #fff;
    cursor: pointer;
  }
  .r1 input {
  	opacity: 0;
  }
  .r1 {
  	margin-left: 25px !important;
  	display: inline-block;
  }
  .r1>input:first-child:checked+input[type=hidden]+label, .r1>input:first-child:checked+label {
    border: 1px solid #ff5757c2 !important;
    box-shadow: rgb(60 64 67 / 10%) 0 1px 5px 0, rgb(60 64 67 / 20%) 0 1px 5px 1px;
	}
</style>
@endsection

@section('main-content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Generate Reports</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-8 col-md-8 col-lg-8 mx-auto mb-3">

				<div class="r1">
					<input type="radio" name="report-for" id="child-report" value="child" checked="">
					<label for="child-report">
						<i class="fas fa-print"></i> Child List
					</label>
				</div>

				<div class="r1">
					<input type="radio" name="report-for" id="immunize-report" value="immunize">
					<label for="immunize-report">
						<i class="fas fa-print"></i> Immunization Records
					</label>
				</div>

				<div class="r1">
					<input type="radio" name="report-for" id="mother-report" value="mother">
					<label for="mother-report">
						<i class="fas fa-print"></i> Mother List
					</label>
				</div>

				<div class="r1">
					<input type="radio" name="report-for" id="prenatal-report" value="prenatal">
					<label for="prenatal-report">
						<i class="fas fa-print"></i> Prenatal Records
					</label>
				</div>

			</div>
		</div>

		<div class="row" id="report-fields">
			<div class="col-sm-8 col-md-8 col-lg-8 mx-auto">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Generating Reports</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	<form id="report-form">
          		<div class="row">
          			<div class="col-sm-12">
          				<div class="form-group">
		          			<label>Child Name</label>
		          			<input type="text" name="child" class="form-control">
		          		</div>
          			</div>
          		</div>
          		<div class="row">
          			<div class="col-sm-6">
          				<div class="form-group">
		          			<label>Date From</label>
		          			<input type="date" name="date_from" class="form-control">
		          		</div>
          			</div>
          			<div class="col-sm-6">
          				<div class="form-group">
		          			<label>Date To</label>
		          			<input type="date" name="date_to" class="form-control">
		          		</div>
          			</div>
          		</div>
          	</form>
          </div>
          <div class="card-footer">
          	<button type="submit" class="btn btn-xs btn-info" form="report-form">
          		<i class="fas fa-print"></i> Generate Reports
          	</button>
          </div>
        </div>
      </div>
    </div>

	</div>
</section>

@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {

		const reports = function(report) {
			if (report == 'child') {
				$('#report-form').html(`
					<div class="row">
      			<div class="col-sm-12">
      				<div class="form-group">
          			<label>Print</label>
          			<select name="print" class="form-control">
          				<option value="all" selected="">All</option>
          				<option value="under_monitoring">Under Monitoring</option>
          				<option value="graduated">Graduated</option>
          			</select>
          		</div>
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-sm-6">
      				<div class="form-group">
          			<label>Date From</label>
          			<input type="date" name="date_from" class="form-control">
          		</div>
      			</div>
      			<div class="col-sm-6">
      				<div class="form-group">
          			<label>Date To</label>
          			<input type="date" name="date_to" class="form-control">
          		</div>
      			</div>
      		</div>
				`)
			}
			else if (report == 'immunize') {
				$('#report-form').html(`
					<div class="row">
      			<div class="col-sm-12">
      				<div class="form-group">
          			<label>Child Name</label>
          			<input type="text" name="child" class="form-control">
          		</div>
      			</div>
      		</div>
				`)
			}
			else if (report == 'mother') {
				$('#report-form').html(`
					<div class="row">
      			<div class="col-sm-12">
      				<div class="form-group">
          			<label>Print</label>
          			<select name="print" class="form-control">
          				<option value="all" selected="">All</option>
          				<option value="under_monitoring">Under Monitoring</option>
          				<option value="complete">Complete</option>
          			</select>
          		</div>
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-sm-6">
      				<div class="form-group">
          			<label>Date From</label>
          			<input type="date" name="date_from" class="form-control">
          		</div>
      			</div>
      			<div class="col-sm-6">
      				<div class="form-group">
          			<label>Date To</label>
          			<input type="date" name="date_to" class="form-control">
          		</div>
      			</div>
      		</div>
				`)
			}
			else if (report == 'prenatal') {
				$('#report-form').html(`
					<div class="row">
      			<div class="col-sm-12">
      				<div class="form-group">
          			<label>Mother Name</label>
          			<input type="text" name="mother" class="form-control">
          		</div>
      			</div>
      		</div>
				`)
			}
		}

		reports('child');

		$(document).on('change', '[name="report-for"]', function(e) {
			reports($(this).val());
		});

		$(document).on('submit', '#report-form', function(e) {
			e.preventDefault();
			var data = []
			$(this).find('input, select').each(function(i, el) {
				data.push(el.name+'='+el.value);
			})
			window.open("{{ route('reports.index') }}?preview=true&report="+$('[name="report-for"]:checked').val()+'&'+(data.join('&')), '_blank')
		})


  });
</script>
@endsection