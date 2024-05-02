@extends('layouts.layout-1')

@section('head-title', 'Mother Lists')

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Patient List</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Patient</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<div class="form-group">
					{{-- <label>Patient Group</label> --}}
					<select name="patient-group" class="form-control">
						<option value="prenatal">Prenatal</option>
						<option value="immunize">Immunize</option>
					</select>
				</div>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1">
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<div class="form-group">
					{{-- <label>First Name</label> --}}
					<input type="text" name="search-first-name" value="" class="form-control" placeholder="First Name">
				</div>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<div class="form-group">
					{{-- <label>Last Name</label> --}}
					<input type="text" name="search-last-name" value="" class="form-control" placeholder="Last Name">
				</div>
			</div>
			<div class="col-sm-2 col-md-2 col-lg-2">
				<button type="button" id="search-pregnant-form" class="btn btn-primary">
					<i class="fas fa-search"></i>
				</button>
				<button type="button" id="btn-refresh-page" class="btn btn-default">
					<i class="fas fa-sync-alt"></i>
				</button>
			</div>
		</div>

		<div class="row" id="pregnant-list-row">
			<div class="col-12 mx-auto">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">Pregnant Lists</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<div class="table-responsive mailbox-messages">
							<table class="table tbl-inbox">
								<thead>
									<th>Name</th>
									<th>Birthday</th>
									<th>Address</th>
									<th>Last Period</th>
									<th>Labor Date</th>
									<th>Record Status</th>
								</thead>
								<tbody id="search-pregnant-row">
									<tr>
										<td class="text-center" colspan="6">
											<i class="fas fa-exclamation-triangle"></i> No record found.
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer p-0">
						<div class="mailbox-controls">
							<div class="float-right paginate-div">
								<!-- paginate display here -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 



		<div class="row" id="children-list-row">
			<div class="col-12 mx-auto">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">Children Lists</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<div class="table-responsive mailbox-messages">
							<table class="table tbl-inbox">
								<thead>
									<th>Child Name</th>
									<th>Birthday</th>
									<th>Gender</th>
									<th>Mother Name</th>
									<th>Record Status</th>
								</thead>
								<tbody id="search-child-row">
									<tr>
										<td class="text-center" colspan="5">
											<i class="fas fa-exclamation-triangle"></i> No record found.
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer p-0">
						<div class="mailbox-controls">
							<div class="float-right paginate-div">
								<!-- paginate display here -->
							</div>
						</div>
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

		/** For Pregnant List **/

		$(document).on('click', '#search-pregnant-form', function(e) {
			if ($('[name=search-first-name]').val().trim()=="") {
				$('[name=search-first-name]').focus();
				return;
			}
			else if ($('[name=search-last-name]').val().trim("")=="") {
				$('[name=search-last-name]').focus();
				return
			}
			var group = $('[name="patient-group"]').val();
			if(group=='prenatal') {
				getSearchPregnant();
			}
			else if (group=='immunize') {
				getSearchChildren();
			}
		})

		$(document).on('click', '.click-search-name', function(e) {
			e.preventDefault();
			var index = $(this).data('index');	
			if ( !confirm('Click OK to continue.') ) return false;
      	
			var group = $('[name="patient-group"]').val();
			if(group=='prenatal') {
				var route ="{{ route('prenatal.index') }}?pregnant=@index";
				window.location.href = route.replace('@index', index);
			}
			else if (group=='immunize') {
				var info = $(this).data('info');	
				var route ="{{ route('immunization.index') }}";
				window.location.href = `${route}?child=${index}&info=${info}`;
			}
		})

		const getSearchPregnant = function() {
			$('#search-pregnant-row').html(`
				<tr>
					<td class="text-center" colspan="6">
						<i class="fas fa-spinner fa-spin"></i> Searching records...
					</td>
				</tr>
			`);
			$.ajax({
				method: 'POST',
				url: "{{ route('prenatal.search') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'search-first-name': $('[name=search-first-name]').val(),
					'search-last-name': $('[name=search-last-name]').val()
				},
				success: function(resp) {
					var searchRow = '';
					if (resp.data.length > 0) {
						for(var i=0; i<resp.data.length; i++) {
							searchRow += `
								<tr>
									<td>
										${resp.data[i].is_record_done?
											`<i class="far fa-check-square text-success text-sm" title="Finalized/Completed"></i>`:
											`<i class="far fa-square text-warning text-sm" title="On Process"></i>`
										}
										<a href="#" class="click-search-name" data-index="${resp.data[i].pregnant_no}">
											${resp.data[i].mother.firstname} ${resp.data[i].mother.lastname}
										</a>
									</td>
									<td>${resp.data[i].mother.birthdate}</td>
									<td>${resp.data[i].mother.address}</td>
									<td>${resp.data[i].last_period}</td>
									<td>${resp.data[i].labor_date?resp.data[i].labor_date:'----'}</td>
									<td>${resp.data[i].is_record_done?'Finalized':'On Process'}</td>
								</tr>
							`;
						}
					}
					else {
						searchRow = `
							<tr>
								<td class="text-center" colspan="6">
									<i class="fas fa-exclamation-triangle"></i> No record found.
								</td>
							</tr>
						`;
					}

					$('#search-pregnant-row').html(searchRow);

				},
				error: function(err) {
					console.log(err);
				}
			})
		}

		const getPregnants = function(pathURL="{{ route('patient.getList') }}") {
			$.loading.show();
			var q = $('[name=q]').val();
			$.ajax({
				method: 'POST',
				url: pathURL,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'list-type': 'prenatal',
				},
				success: function(resp) {

					var a = (resp.current_page*resp.per_page)-resp.per_page;
					var b = a + resp.to;
					var page = `
						${a+1}-${resp.to}/${resp.total}
						<div class="btn-group">
							${ resp.current_page <= 1 ?
							`<span class="btn btn-default btn-sm" style="cursor: not-allowed;background: #d3d3d39c !important;color: #a29e9e !important;">
								<i class="fas fa-chevron-left"></i>
							</span>`:
							`<a href="${resp.prev_page_url}" class="btn btn-default btn-sm btn-paginate">
								<i class="fas fa-chevron-left"></i>
							</a>`
							}
							${ resp.last_page <= resp.current_page ?
							`<span class="btn btn-default btn-sm" style="cursor: not-allowed;background: #d3d3d39c !important;color: #a29e9e !important;">
								<i class="fas fa-chevron-right"></i>
							</span>`:
							`<a href="${resp.next_page_url}" class="btn btn-default btn-sm btn-paginate">
								<i class="fas fa-chevron-right"></i>
							</a>`
							}
						</div>
					`;

					$('.paginate-div').html(page);

					var htmlRow = '';
					if (resp.data.length) {
						for(var i=0; i<resp.data.length; i++) {
							htmlRow += `
								<tr>
									<td>
										${resp.data[i].is_record_done?
											`<i class="far fa-check-square text-success text-sm" title="Finalized/Completed"></i>`:
											`<i class="far fa-square text-warning text-sm" title="On Process"></i>`
										}
										<a href="#" class="click-search-name" data-index="${resp.data[i].pregnant_no}">
											${resp.data[i].mother.firstname} ${resp.data[i].mother.lastname}
										</a>
									</td>
									<td>${resp.data[i].mother.birthdate}</td>
									<td>${resp.data[i].mother.address}</td>
									<td>${resp.data[i].last_period}</td>
									<td>${resp.data[i].labor_date?resp.data[i].labor_date:'----'}</td>
									<td>${resp.data[i].is_record_done?'Finalized':'On Process'}</td>
								</tr>
							`;
						}
					}
					else {
						htmlRow = `
							<tr>
								<td colspan="6" class="text-center">
									<i class="fas fa-exclamation-triangle"></i> 
									No data found.
								</td>
							</tr>
						`;
					}

					$('#search-pregnant-row').html(htmlRow);

					$.loading.hide();
				},
				error: function(err) {
					console.log(err);
					$.loading.hide();
				}
			})	
		}

		/** End function For Pregnant List here **/




		/** For Children List here **/

		const getSearchChildren = function() {
			$('#search-child-row').html(`
				<tr>
					<td class="text-center" colspan="5">
						<i class="fas fa-spinner fa-spin"></i> Searching records...
					</td>
				</tr>
			`);
			$.ajax({
				method: 'GET',
				url: "{{ route('children.show', ['child'=>0]) }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'search-first-name': $('[name=search-first-name]').val(),
					'search-last-name': $('[name=search-last-name]').val(),
					'rtype': 'search'
				},
				success: function(resp) {
					var searchRow = '';
					if (resp.data.length > 0) {
						for(var i=0; i<resp.data.length; i++) {
							searchRow += `
								<tr>
									<td>
										${resp.data[i].is_record_done?
											`<i class="far fa-check-square text-success text-sm" title="Completed"></i>`:
											`<i class="far fa-square text-warning text-sm" title="On Process"></i>`
										}
										<a href="#" class="click-search-name" data-index="${resp.data[i].id}" data-info="${resp.data[i].firstname} ${resp.data[i].lastname}">
											${resp.data[i].firstname} ${resp.data[i].lastname}
										</a>
									</td>
									<td>${resp.data[i].birthdate}</td>
									<td>${resp.data[i].gender}</td>
									<td>
										${resp.data[i].parent.mother.firstname}
										${resp.data[i].parent.mother.lastname}
									</td>
									<td>${resp.data[i].is_record_done?'Finalized':'On Process'}</td>
								</tr>
							`;
						}
					}
					else {
						searchRow = `
							<tr>
								<td class="text-center" colspan="6">
									<i class="fas fa-exclamation-triangle"></i> No record found.
								</td>
							</tr>
						`;
					}

					$('#search-child-row').html(searchRow);

				},
				error: function(err) {
					console.log(err);
				}
			})
		}

		const getChildren = function(pathURL="{{ route('patient.getList') }}") {
			$.loading.show();
			var q = $('[name=q]').val();
			$.ajax({
				method: 'POST',
				url: pathURL,
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'list-type': 'immunize',
				},
				success: function(resp) {

					var a = (resp.current_page*resp.per_page)-resp.per_page;
					var b = a + resp.to;
					var page = `
						${a+1}-${resp.to}/${resp.total}
						<div class="btn-group">
							${ resp.current_page <= 1 ?
							`<span class="btn btn-default btn-sm" style="cursor: not-allowed;background: #d3d3d39c !important;color: #a29e9e !important;">
								<i class="fas fa-chevron-left"></i>
							</span>`:
							`<a href="${resp.prev_page_url}" class="btn btn-default btn-sm btn-paginate">
								<i class="fas fa-chevron-left"></i>
							</a>`
							}
							${ resp.last_page <= resp.current_page ?
							`<span class="btn btn-default btn-sm" style="cursor: not-allowed;background: #d3d3d39c !important;color: #a29e9e !important;">
								<i class="fas fa-chevron-right"></i>
							</span>`:
							`<a href="${resp.next_page_url}" class="btn btn-default btn-sm btn-paginate">
								<i class="fas fa-chevron-right"></i>
							</a>`
							}
						</div>
					`;

					$('.paginate-div').html(page);

					var htmlRow = '';
					if (resp.data.length) {
						for(var i=0; i<resp.data.length; i++) {
							htmlRow += `
								<tr>
									<td>
										${resp.data[i].is_record_done?
											`<i class="far fa-check-square text-success text-sm" title="Completed"></i>`:
											`<i class="far fa-square text-warning text-sm" title="On Process"></i>`
										}
										<a href="#" class="click-search-name" data-index="${resp.data[i].id}" data-info="${resp.data[i].firstname} ${resp.data[i].lastname}">
											${resp.data[i].firstname} ${resp.data[i].lastname}
										</a>
									</td>
									<td>${resp.data[i].birthdate}</td>
									<td>${resp.data[i].gender}</td>
									<td>
										${resp.data[i].parent.mother.firstname}
										${resp.data[i].parent.mother.lastname}
									</td>
									<td>${resp.data[i].is_record_done?'Finalized':'On Process'}</td>
								</tr>
							`;
						}
					}
					else {
						htmlRow = `
							<tr>
								<td colspan="6" class="text-center">
									<i class="fas fa-exclamation-triangle"></i> 
									No data found.
								</td>
							</tr>
						`;
					}

					$('#search-child-row').html(htmlRow);

					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
				}
			})	
		}

		











		const onLoadPage = function() {
			$('[name=search-first-name]').val('');
			$('[name=search-last-name]').val('');
			var group = $('[name="patient-group"]').val();
			if(group=='prenatal') {
				getPregnants();
				$('#pregnant-list-row').show();
				$('#children-list-row').hide();
			}
			else if (group=='immunize') {
				getChildren();
				$('#pregnant-list-row').hide();
				$('#children-list-row').show();
			}
		}

		onLoadPage();

		$(document).on('change', '[name="patient-group"]', function() {
			onLoadPage();
		})

		$(document).on('click', '#btn-refresh-page', function() {
			onLoadPage();
		})

	})
</script>
@endsection