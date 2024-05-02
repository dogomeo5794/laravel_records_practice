@extends('layouts.layout-1')

@section('head-title', 'Admin | Settings')

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Settings</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Admin</a></li>
					<li class="breadcrumb-item active">Settings</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-md-7 col-lg-7">

				<div class="card card-outline card-primary">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-cogs"></i> Settings - [<span id="status"></span>]
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive">
						<form id="update-status">
							<div class="form-group">
								<label>System Status</label>
								<select class="form-control" name="system-status">
									<option value="" selected="" disabled=""></option>
									<option value="Active">Active</option>
									<option value="Under Mentainance">Under Mentainance</option>
									<option value="Down">Down</option>
									<option value="Disable">Disable</option>
								</select>
								<span class="error invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label>System Remarks</label>
								<textarea class="form-control" name="system-remarks" style="min-height: 200px;"></textarea>
								<span class="error invalid-feedback"></span>
							</div>
							<button form="update-status" type="submit" class="btn btn-sm btn-primary float-right">
								<i class="fas fa-check"></i> Save Changes
							</button>
						</form>
					</div>
					<!-- /.card-body -->
				</div>

				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1">
								<i class="fas fa-file"></i>
							</span>

							<div class="info-box-content">
								<span class="info-box-text">Account Logs</span>
								<a href="{{ route('account.logs') }}" class="info-box-number child-total">
									Open
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1">
								<i class="fas fa-file"></i>
							</span>

							<div class="info-box-content">
								<span class="info-box-text">SMS Logs</span>
								<a href="{{ route('sms.logs') }}" class="info-box-number child-total">
									Open
								</a>
							</div>
						</div>
					</div>
				</div>


				<div class="card card-outline card-success">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-envelope"></i> Total Population
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive">
						<form id="population-total-form">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Women with 18 y/o - 50 y/o
											<ul>
												<li>Total Active: <strong id="p-women-no">0</strong></li>
											</ul>
										</label>
										<input type="text" class="form-control" name="population-women">
										<span class="error invalid-feedback"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Children with 0 d/o - 2 y/o
											<ul>
												<li>Total Active: <strong id="p-children-no">0</strong></li>
											</ul>
										</label>
										<input type="text" class="form-control" name="population-children">
										<span class="error invalid-feedback"></span>
									</div>
								</div>
							</div>
							<button form="population-total-form" type="submit" class="btn btn-sm btn-success float-right">
								<i class="fas fa-check"></i> Save Changes
							</button>
						</form>
					</div>
				</div>

			</div>

			<div class="col-sm-4 col-md-5 col-lg-5">

				<div class="card card-outline card-success">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-envelope"></i> SMS Content for Prenatal Notification
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive">
						<form id="sms-format-prenatal-form">
							<div class="form-group">
								<label>
									Legend: 
									<ul>
										<li>&lt;mother&gt; - Name of Mother</li>
										<li>&lt;sched&gt; - Schedule (Today, Tomorrow)</li>
									</ul>
								</label>
								<textarea class="form-control" name="sms-format-prenatal" style="min-height: 150px;" maxlength="300"></textarea>
								<span class="label-length"><span class="sms-prenatal-count">0</span>/300</span>
							</div>
							<button form="sms-format-prenatal-form" type="submit" class="btn btn-sm btn-success float-right">
								<i class="fas fa-check"></i> Save SMS Content
							</button>
						</form>
					</div>
				</div>

				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-envelope"></i> SMS Content for Immunize Notification
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive">
						<form id="sms-format-immunize-form">
							<div class="form-group">
								<label>
									Legend: 
									<ul>
										<li>&lt;mother&gt; - Name of Mother</li>
										<li>&lt;baby&gt; - Name of Baby</li>
										<li>&lt;sched&gt; - Schedule (Today, Tomorrow)</li>
									</ul>
								</label>
								<textarea class="form-control" name="sms-format-immunize" style="min-height: 150px;" maxlength="300"></textarea>
								<span class="label-length"><span class="sms-immunize-count">0</span>/300</span>
							</div>
							<button form="sms-format-immunize-form" type="submit" class="btn btn-sm btn-info float-right">
								<i class="fas fa-check"></i> Save SMS Content
							</button>
						</form>
					</div>
				</div>


			</div>
		</div>
		<!-- /.row -->
	</div>
</section>
@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {
		$(document).on('change', '[name="system-status"]', function(e) {
			$('[name="system-remarks"]').val('System is '+$(this).val()+'!');
		})

		$(document).on('change', '.form-control', function(e) {
			$(this).removeClass('is-invalid');
			$(this).closest('.form-group').find('.error:first').text('');
		})

		$(document).on('keyup', '[name="sms-format-prenatal"]', function() {
			var text = $(this).val().split('');
			var finalText = [];
			for(var i=0; i < 300; i++) {
				finalText[i] = text[i];
			}
			if (text.length <= 300) {
				$('.sms-prenatal-count').text(text.length);
			}
			else {
				$(this).val(finalText.join(''));
			}
		})

		$(document).on('keyup', '[name="sms-format-immunize"]', function() {
			var text = $(this).val().split('');
			var finalText = [];
			for(var i=0; i < 300; i++) {
				finalText[i] = text[i];
			}
			if (text.length <= 300) {
				$('.sms-immunize-count').text(text.length);
			}
			else {
				$(this).val(finalText.join(''));
			}
		})

		const Setting = {
			get: function () {
				$.loading.show({title:'Loading...'});
				$.ajax({
					method: 'POST',
					url: "{{ route('admin.settings.store') }}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						'rtype': 'get-system-status'
					},
					success: function(resp) {
						$.loading.hide();
						if (resp.data==null) {
							$('#status').text('Not setup');
						}
						else {
							var data = JSON.parse(resp.data.data);
							$('#status').text(data['system-status']);
							$('[name="system-remarks"]').val(resp.data.remarks)
							$('[name="system-status"').val(data['system-status']);
						}

						if (resp.population==null) {
							$('#p-women-no').text('0');
							$('#p-children-no').text('0');
						}
						else {
							var data = JSON.parse(resp.population.data);
							$('#p-women-no').text(data['women']);
							$('#p-children-no').text(data['children']);
						}

						if (resp['sms-format-prenatal']==null) {
							$('[name="sms-format-prenatal"]').val('');
						}
						else {
							var data = JSON.parse(resp['sms-format-prenatal'].data);
							$('[name="sms-format-prenatal"]').val(data['sms_format']);
						}

						if (resp['sms-format-immunize']==null) {
							$('[name="sms-format-immunize"]').val('');
						}
						else {
							var data = JSON.parse(resp['sms-format-immunize'].data);
							$('[name="sms-format-immunize"]').val(data['sms_format']);
						}

						

						console.log(resp);
					},
					error: function(err) {
						$.loading.hide();
						console.log(err);
					}
				})
			},
			update: function(data) {
				$('.form-control').removeClass('is-invalid');
				$('.form-control').closest('.form-group').find('.error:first').text('');
				$.loading.show({title:'Loading...'});
				$.ajax({
					method: 'POST',
					url: "{{ route('admin.settings.store') }}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						'rtype': 'update-system-status',
						'system-remarks': data.remarks,
						'system-status': data.status,
					},
					success: function(resp) {
						console.log(resp);
						if (resp.statusCode==419) {
							for (var i in resp.errors) {
								$(`[name="${i}"]`).addClass('is-invalid');
								$(`[name="${i}"]`).closest('.form-group').find('.error:first').text(resp.errors[i]);
							}
							toastr.error(resp.message);
						}
						else {
							$('#status').text();
							toastr.success(resp.message);
							Setting.get();
						}
						$.loading.hide();
					},
					error: function(err) {
						$.loading.hide();
						console.log(err);
					}
				})
			},
			population: {
				'update': function(data) {
					$('.form-control').removeClass('is-invalid');
					$('.form-control').closest('.form-group').find('.error:first').text('');
					$.loading.show({title:'Loading...'});
					$.ajax({
						method: 'POST',
						url: "{{ route('admin.settings.store') }}",
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						data: {
							'rtype': 'update-population',
							'women': data.women,
							'children': data.children,
						},
						success: function(resp) {
							console.log(resp);
							if (resp.statusCode==419) {
								for (var i in resp.errors) {
									$(`[name="population-${i}"]`).addClass('is-invalid');
									$(`[name="population-${i}"]`).closest('.form-group').find('.error:first').text(resp.errors[i]);
								}
								toastr.error(resp.message);
							}
							else {
								$('[name="population-women"]').val('');
								$('[name="population-children"]').val('');
								toastr.success(resp.message);
								Setting.get();
							}
							$.loading.hide();
						},
						error: function(err) {
							$.loading.hide();
							console.log(err);
						}
					})
				}
			},
			prenatal_sms: {
				'update': function(data) {
					$.loading.show({title:'Loading...'});
					$.ajax({
						method: 'POST',
						url: "{{ route('admin.settings.store') }}",
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						data: {
							'rtype': 'update-sms-format-prenatal',
							'sms_format': data.sms_format,
						},
						success: function(resp) {
							console.log(resp);
							if (resp.statusCode==419) {
								toastr.error("Can not update with empty sms format for prenatal notification.");
							}
							else {
								toastr.success(resp.message);
								Setting.get();
							}
							$.loading.hide();
						},
						error: function(err) {
							$.loading.hide();
							console.log(err);
						}
					})
				}
			},
			immunize_sms: {
				'update': function(data) {
					$.loading.show({title:'Loading...'});
					$.ajax({
						method: 'POST',
						url: "{{ route('admin.settings.store') }}",
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						data: {
							'rtype': 'update-sms-format-immunize',
							'sms_format': data.sms_format,
						},
						success: function(resp) {
							console.log(resp);
							if (resp.statusCode==419) {
								toastr.error("Can not update with empty sms format for immunize notification.");
							}
							else {
								toastr.success(resp.message);
								Setting.get();
							}
							$.loading.hide();
						},
						error: function(err) {
							$.loading.hide();
							console.log(err);
						}
					})
				}
			}

		}

		Setting.get();

		$(document).on('submit', '#update-status', function(e) {
			e.preventDefault();
			Setting.update({
				'remarks': $(this).find('[name="system-remarks"]:first').val(),
				'status': $(this).find('[name="system-status"]:first').val()
			});
		})

		$(document).on('submit', '#population-total-form', function(e) {
			e.preventDefault();
			Setting.population.update({
				'women': $(this).find('[name="population-women"]').val(),
				'children': $(this).find('[name="population-children"]').val(),
			});
		})

		$(document).on('submit', '#sms-format-prenatal-form', function(e) {
			e.preventDefault();
			Setting.prenatal_sms.update({
				'sms_format': $(this).find('[name="sms-format-prenatal"]').val(),
			});
		})

		$(document).on('submit', '#sms-format-immunize-form', function(e) {
			e.preventDefault();
			Setting.immunize_sms.update({
				'sms_format': $(this).find('[name="sms-format-immunize"]').val(),
			});
		})

		
	})
</script>
@endsection