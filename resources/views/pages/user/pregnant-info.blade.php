@extends('layouts.layout-1')

@section('head-title', 'Mother Information')

@section('main-footer')
@endsection

@section('main-sidebar')
	@include('layouts.mother-sidebar')
@endsection

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Mother Information</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Mother</li>
					<li class="breadcrumb-item active">Information</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid" style="padding-bottom: 50px;">

		<div class="row" id="mother-info-display">
			<div class="col-sm-12">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">
							Mother information 
						</h3>
						@php
							$mother = $data;
							$father = $data->partner()->first()->father;
						@endphp
						<button class="float-right btn btn-xs btn-primary btn-update-info" title="Update Information" data-mother="{{ $mother->id }}" data-father="{{ $father->id }}">
							<i class="fas fa-edit"></i>
						</button>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<style type="text/css">
							table.table td.td-label {
						    font-weight: bold;
						    width: 120px;
						    white-space: nowrap;
							}
						</style>
						<table class="table table-bordereds">
							<tbody>
								<tr>
									<th colspan="2" class="bg-info">Mother Information</th>
								</tr>
								<tr>
									<td class="td-label">Name:</td>
									<td>
										{{ ucfirst($mother->firstname) }} 
										{{ ucfirst($mother->middlename) }} 
										{{ ucfirst($mother->lastname) }} 
									</td>
								</tr>
								<tr>
									<td class="td-label">Birthday:</td>
									<td>{{ date('M d, Y', strtotime($mother->birthdate)) }}</td>
								</tr>
								<tr>
									<td class="td-label">Age:</td>
									<td>{{ getAge($mother->birthdate) }}</td>
								</tr>
								<tr>
									<td class="td-label">Civil Status:</td>
									<td>{{ ucfirst($mother->civil_status) }}</td>
								</tr>
								<tr>
									<td class="td-label">Contact:</td>
									<td>{{ $mother->contact }}</td>
								</tr>
								<tr>
									<td class="td-label">Address:</td>
									<td>{{ ucwords($mother->address) }}</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>

								<tr>
									<th colspan="2" class="bg-info">Partner/Father Information</th>
								</tr>
								<tr>
									<td class="td-label">Name:</td>
									<td>
										{{ ucfirst($father->firstname) }} 
										{{ ucfirst($father->middlename) }} 
										{{ ucfirst($father->lastname) }} 
									</td>
								</tr>
								<tr>
									<td class="td-label">Birthday:</td>
									<td>{{ date('M d, Y', strtotime($father->birthdate)) }}</td>
								</tr>
								<tr>
									<td class="td-label">Age:</td>
									<td>{{ getAge($father->birthdate) }}</td>
								</tr>
								<tr>
									<td class="td-label">Contact:</td>
									<td>{{ $father->contact }}</td>
								</tr>
								<tr>
									<td class="td-label">Address:</td>
									<td>{{ ucwords($father->address) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</div>

		<div class="row" id="mother-info-edit">
			<!--  -->
		</div> 


	</div>
</section>
@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {
		$(document).on('click', '.btn-update-info', function(e) {
			var mother = $(this).data('mother');
			var father = $(this).data('father');

			$.loading.show({title:'Generating form...'});
			$.get("{{ route('mother.info', ['mother'=>'@m']) }}".replace('@m', mother))
			.then(function(html) {
				$.loading.hide();
				$('#mother-info-display').hide();
				$('#mother-info-edit').html(html);
			});
		})

		$(document).on('click', '.btn-cancel-mother-update', function(e) {
			if ( !confirm('Are you sure to cancel the update?') ) return false;
			$('#mother-info-display').show();
			$('#mother-info-edit').html('');
		})




		// code from server response
		$(document).on('click', '.check-same-lname', function() {
			var cls = $(this).find('i.far:first');
			if (cls.hasClass('fa-square')) {
				cls.removeClass('fa-square').addClass('fa-check-square');
				$('[name=father-last-name]').val($('[name=last-name]').val());
			}
			else {
				cls.removeClass('fa-check-square').addClass('fa-square');
				$('[name=father-last-name]').val('');
			}
		})

		$(document).on('click', '.check-same-address', function() {
			var cls = $(this).find('i.far:first');
			if (cls.hasClass('fa-square')) {
				cls.removeClass('fa-square').addClass('fa-check-square');
				$('[name=father-address]').val($('[name=address]').val());
			}
			else {
				cls.removeClass('fa-check-square').addClass('fa-square');
				$('[name=father-address]').val('');
			}
		})

		$(document).on('change', '#update-mother-info-form input, #update-mother-info-form select', function() {
			$(this).removeClass('is-invalid')
			$(this).closest('.form-group').find('.error:first').remove()
		})

		$(document).on('submit', '#update-mother-info-form', function(e) {
			e.preventDefault();

			if ( !confirm('Click OK to continue.') ) return false;

			$.loading.show({title:'Updating data...'})

			var data = {};
			$(this).find('input, select').each(function(i, elem) {
				data[elem.name] = elem.value;
			});
			data['mother-no'] = $(this).data('mother');
			data['father-no'] = $(this).data('father');

			console.log(data)

			$.ajax({
				method: 'PUT',
				url: "{{ route('pregnants.update', ['pregnant'=>$mother->id]) }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: data,
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==419) {
						for(var i in resp.errors) {
							if ( !$(`[name=${i}]`).hasClass('is-invalid') ) {
								$(`[name=${i}]`).addClass('is-invalid').closest('.form-group').append(`
									<span class="error invalid-feedback">
										${resp.errors[i][0]}
									</span>
								`);
							}
							else {
								$(`[name=${i}]`).closest('.form-group').find('span.error:first').text(resp.errors[i][0]);
							}
						}
						toastr.error(resp.message);
					}
					else if (resp.statusCode==200) {
						toastr.success(resp.message);
						setTimeout(function() {
							alert('Reload the page to see the changes.');
							window.location.reload();
						}, 1000);
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
					toastr.error('System error, Contact your administrator to fix the errors.');
				}
			})
		})
	})
</script>
@endsection