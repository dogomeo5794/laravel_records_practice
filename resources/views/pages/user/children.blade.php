@extends('layouts.layout-1')

@section('head-title', 'Children Lists')

@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Children Records</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Children</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12 mx-auto">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">Child with imuunization records</h3>
						<div class="card-tools">
							<form action="#" method="POST" id="search">
								<div class="input-group input-group-sm">
									<input type="search" name="q" class="form-control" placeholder="Search...">
									<div class="input-group-append">
										<button type="submit" class="btn btn-primary">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<div class="table-responsive mailbox-messages">
							<table class="table tbl-inbox">
								<thead>
									<th style="width: 1px;">#</th>
									<th>Name</th>
									<th style="width: 100px">Birthdate</th>
									<th style="width: 10px">Age</th>
									<th style="width: 100px">Mother</th>
									<th style="width: 100px" class="text-nowrap">Immunize Status</th>
								</thead>
								<tbody id="table-pregnant">
									<!-- display here.. -->
								</tbody>
							</table>
							<!-- /.table -->
						</div>
						<!-- /.mail-box-messages -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer p-0">
						<div class="mailbox-controls">
							<button type="button" class="btn btn-default btn-sm btn-refresh-pregnant">
								<i class="fas fa-sync-alt"></i>
							</button>
							<button type="button" class="btn btn-info btn-sm btn-add-pregnant">
								<i class="fas fa-plus-circle"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm btn-search-pregnant">
								<i class="fas fa-search"></i> Find & Add
							</button>
							<div class="float-right paginate-div">
								<!-- paginate display here -->
							</div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>

		</div> 


	</div>
</section>



<div class="modal fade" data-backdrop="static" id="modal-add-baby">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Baby for Immunization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="add-baby-form">
        	<style type="text/css">
        		.nav.nav-pills.nav-tab {
        			border-bottom: 2px double lightgrey;
					    margin-bottom: 10px;
					    padding: 5px 15px;
					    margin-left: -16px !important;
					    margin-right: -16px !important;
					    margin-top: -16px;
        		}
        		ul.nav.nav-pills.nav-tab li a {
						  border-radius: 0;
						  padding: 5px 10px;
						}
						p.label-info {
							border: 1px solid #80808094;
					    padding: 5px;
					    font-size: 15px;
					    font-weight: 600;
					    text-align: center;
						}
        	</style>
        	<ul class="nav nav-pills ml-auto nav-tab">
             <li class="nav-item">
              <a class="nav-link active mother-tab" href="#mother-tab" data-toggle="tab">Mother</a>
            </li>
            <li class="nav-item">
              <a class="nav-link father-tab" href="#father-tab" data-toggle="tab">Father</a>
            </li>
            <li class="nav-item">
              <a class="nav-link baby-tab" href="#baby-tab" data-toggle="tab">Baby</a>
            </li>
          </ul>
          <div class="tab-content p-0">

						<div class="form-for-pregnant tab-pane active" id="mother-tab">
							<p class="label-info">Mother Information</p>
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="last-name" class="form-control" placeholder="Last Name">
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" name="first-name" value="" class="form-control" placeholder="First Name">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>Middle Name</label>
										<input type="text" name="middle-name" value="" class="form-control" placeholder="Middle Name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<label>Civil</label>
										<select name="civil-status" class="form-control">
											<option value="" disabled selected>-- Select --</option>
											<option value="single">Single</option>
											<option value="married">Married</option>
											<option value="widowed">Widowed</option>
											<option value="separated">Separated</option>
										</select>
									</div>
								</div>
								<div class="col-sm-5 col-md-5 col-lg-5">
									<div class="form-group">
										<label>Birthdate</label>
										<input type="date" max="{{ date('Y-m-d') }}" name="birthdate" class="form-control">
									</div>
								</div>
								<div class="col-sm-3 col-md-3 col-lg-3">
									<div class="form-group">
										<label>Age</label>
										<input type="number" name="age" class="form-control" step="1" min="0" max="100">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" placeholder="Address">
							</div>
							<div class="form-group">
								<label>Contact</label>
								<input type="text" name="contact" value="" class="form-control" placeholder="Contact">
							</div>
						</div>

						<div class="form-for-father tab-pane" id="father-tab">
							<p class="label-info">Father Information</p>
							<div class="form-group">
								<label>Last Name 
									( <span class="check-same-lname">
										<i class="far fa-square"></i> Same in Mother?
									</span> )
								</label>
								<input type="text" name="father-last-name" class="form-control" placeholder="Last Name">
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" name="father-first-name" value="" class="form-control" placeholder="First Name">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>Middle Name</label>
										<input type="text" name="father-middle-name" value="" class="form-control" placeholder="Middle Name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8 col-md-8 col-lg-8">
									<div class="form-group">
										<label>Birthdate</label>
										<input type="date" max="{{ date('Y-m-d') }}" name="father-birthdate" class="form-control">
									</div>
								</div>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<label>Age</label>
										<input type="number" name="father-age" class="form-control" step="1" min="0" max="100">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Address 
									( <span class="check-same-address">
										<i class="far fa-square"></i> Same in Mother?
									</span> )
								</label>
								<input type="text" name="father-address" class="form-control" placeholder="Address">
							</div>
							<div class="form-group">
								<label>Contact</label>
								<input type="text" name="father-contact" value="" class="form-control" placeholder="Contact">
							</div>
						</div>

						<div class="form-for-baby tab-pane" id="baby-tab">
							<p class="label-info">Baby Information</p>
							<div class="form-group">
								<label>Last Name 
									( <span class="baby-lname-same-in-father">
										<i class="far fa-square"></i> 
										<span style="font-size: 12px;"> Same in Father?</span>
									</span> )
								</label>
								<input type="text" name="baby-last-name" class="form-control" placeholder="Last Name">
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" name="baby-first-name" value="" class="form-control" placeholder="First Name">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>M.N
											( <span class="baby-lname-same-in-mother">
												<i class="far fa-square"></i>
												<span style="font-size: 12px;"> Same in Mother?</span>
											</span> )
										</label>
										<input type="text" name="baby-middle-name" value="" class="form-control" placeholder="Middle Name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-7 col-md-7 col-lg-7">
									<div class="form-group">
										<label>Birthdate</label>
										<input type="date" max="{{ date('Y-m-d') }}" name="baby-birthdate" class="form-control">
									</div>
								</div>
								<div class="col-sm-5 col-md-5 col-lg-5">
									<div class="form-group">
										<label>Age (<small>Format: 1 day or 1 month</small>)</label>
										<input type="text" name="baby-age" class="form-control" placeholder="e.g 1 day, 1 month">
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<label>Gender</label>
										<select name="baby-gender" class="form-control">
											<option value="" selected="" disabled="">--Select--</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
								</div>
								<div class="col-sm-5 col-md-5 col-lg-5">
									<div class="form-group">
										<label>Birth Weight (grams)</label>
										<input type="text" name="baby-weight" class="form-control">
									</div>
								</div>
								<div class="col-sm-3 col-md-3 col-lg-3">
									<div class="form-group">
										<label>Birth Order</label>
										<input type="number" name="baby-birthorder" step="1" min="0" max="20" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
										<label>Place of Birth</label>
										<input type="text" name="baby-birthplace" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
										<label>Born at (e.g Hospital, Hilot, and etc.)</label>
										<input type="text" name="baby-born-at" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="form-group">
										<label>Remarks</label>
										<textarea name="baby-remarks" class="form-control">
										</textarea>
									</div>
								</div>
							</div>
						</div>

					</div>
				</form>
      </div>
      <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="add-baby-form" name="save-continue" value="" class="btn btn-primary btn-sm">
	          <i class="fas fa-check-circle"></i> 
	          Save
	        </button>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade" data-backdrop="static" id="modal-search-pregnant">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Search Existing Pregnant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="search-pregnant-form">
					<div class="form-for-search-pregnant">
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="search-first-name" value="" class="form-control" placeholder="First Name">
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="search-last-name" value="" class="form-control" placeholder="Last Name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<table class="table table-hover table-stripe">
									<thead>
										<th>Name</th>
										<th>Birthday</th>
										<th>Address</th>
									</thead>
									<tbody id="search-pregnant-row">
										<tr>
											<td class="text-center" colspan="3">
												<i class="fas fa-exclamation-triangle"></i> No record found.
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="search-pregnant-form" class="btn btn-primary btn-sm">
	          <i class="fas fa-search"></i> 
	          Search
	        </button>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {

		$(document).on('click', '.btn-add-pregnant', function() {
			$('#add-baby-form').find('input, select').each(function(i, elem) {
				$(elem).val('');
				$(elem).removeClass('is-invalid').closest('.form-group').find('span.error:first').remove();
			})
			$('#modal-add-baby').modal('show');
		})

		const getChildren = function(pathURL="{{ route('children.index') }}") {
			$.loading.show();
			var q = $('[name=q]').val();
			$.ajax({
				method: 'GET',
				url: pathURL,
				data: {
					'q': q,
					'request-type': 'get-children',
					'_token': $('meta[name="csrf-token"]').attr('content'),
				},
				success: function(resp) {
					console.log(resp);

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
									<td>${i+1}</td>
									<td class="mailbox-name" style="min-width: 150px; width: 130px;">
										<span class="text-overflow-dynamic-container">
											<span class="text-overflow-dynamic-ellipsis">
												<a href="${"{{ route('children.show', ['child'=>'@id']) }}".replace('@id', resp.data[i].id)}" target="_blank">
													${resp.data[i].firstname} 
													${resp.data[i].lastname} 
												</a>
											</span>
										</span>
									</td>
									<td class="text-nowrap">${resp.data[i].birthdate}</td>
									<td class="text-nowrap">${getBabyAge(resp.data[i].birthdate)}</td>
									<td class="text-nowrap">
										${resp.data[i].parent.mother.firstname} 
										${resp.data[i].parent.mother.lastname} 
									</td>
									<td class="mailbox-date" style="width: 60px;">
										${resp.data[i].is_record_done?
											`<small class="text-default">
												<i><i class="fas fa-check"></i> Records complete</i>
											</small>`:
											`<small>
												<a href="{{ route('immunization.index') }}?child=${resp.data[i].id}&info=${resp.data[i].firstname}+${resp.data[i].lastname}" class="btn btn-xs btn-primary btn-flat btn-block" style="
											    color: white;
											    font-size: 11px !important;
											    /* margin: -15px 0 -10px 0; */
											    margin: -2px 0 -10px 0;
										    ">
													<i><i class="fas fa-calendar"></i> Has Schedule</i>
												</a>
											</small>`
										}
									</td>
								</tr>
							`;
						}
					}
					else {
						htmlRow = `
							<tr>
								<td colspan="5" class="text-center">
									<i class="fas fa-exclamation-triangle"></i> 
									No data found.
								</td>
							</tr>
						`;
					}

					$('#table-pregnant').html(htmlRow);

					$.loading.hide();
				},
				error: function(err) {
					console.log(err);
					$.loading.hide();
				}
			})	
		}
		getChildren();


		$(document).on('click', '.btn-refresh-pregnant', function(e) {
			$('[name=q]').val('');
			getChildren();
		})

		$(document).on('click', '.btn-paginate', function(e) {
			e.preventDefault();
			getChildren($(this).attr('href'));
		})

		$(document).on('submit', '#search', function(e) {
			e.preventDefault();
			getChildren();
		})

		$(document).on('click', '.check-same-lname', function() {
			var cls = $(this).find('i.far:first');
			if (cls.hasClass('fa-square')) {
				cls.removeClass('fa-square').addClass('fa-check-square');
				$('[name=father-last-name]').val($('[name=last-name]').val()).trigger('change');
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
				$('[name=father-address]').val($('[name=address]').val()).trigger('change');
			}
			else {
				cls.removeClass('fa-check-square').addClass('fa-square');
				$('[name=father-address]').val('');
			}
		})

		$(document).on('click', '.baby-lname-same-in-father', function(e) {
			var cls = $(this).find('i.far:first');
			if (cls.hasClass('fa-square')) {
				cls.removeClass('fa-square').addClass('fa-check-square');
				$('[name=baby-last-name]').val($('[name=father-last-name]').val()).trigger('change');
			}
			else {
				cls.removeClass('fa-check-square').addClass('fa-square');
				$('[name=baby-last-name]').val('');
			}
		});
		$(document).on('click', '.baby-lname-same-in-mother', function(e) {
			var cls = $(this).find('i.far:first');
			if (cls.hasClass('fa-square')) {
				cls.removeClass('fa-square').addClass('fa-check-square');
				$('[name=baby-middle-name]').val($('[name=middle-name]').val()).trigger('change');
			}
			else {
				cls.removeClass('fa-check-square').addClass('fa-square');
				$('[name=baby-middle-name]').val('');
			}
		});

		$(document).on('click', '.btn-search-pregnant', function() {

			$('#search-pregnant-row').html(`
				<tr>
					<td class="text-center" colspan="3">
						<i class="fas fa-exclamation-triangle"></i> No record found.
					</td>
				</tr>
			`);
			$('[name=search-first-name]').val('');
			$('[name=search-last-name]').val('');
			$('#modal-search-pregnant').modal('show');
		})

		$(document).on('change', '#add-baby-form input, #add-baby-form select', function() {
			$(this).removeClass('is-invalid')
			$(this).closest('.form-group').find('.error:first').remove()
		})

		var dataSearchFound = [];
		$(document).on('submit', '#search-pregnant-form', function(e) {
			e.preventDefault();
			$('#search-pregnant-row').html(`
				<tr>
					<td class="text-center" colspan="3">
						<i class="fas fa-spinner fa-spin"></i> Searching records...
					</td>
				</tr>
			`);
			$.ajax({
				method: 'POST',
				url: "{{ route('pregnants.search') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'search-first-name': $('[name=search-first-name]').val(),
					'search-last-name': $('[name=search-last-name]').val()
				},
				success: function(resp) {
					console.log(resp);
					var searchRow = '';
					if (resp.data.length > 0) {
						for(var i=0; i<resp.data.length; i++) {
							dataSearchFound[i] = resp.data[i];
							searchRow += `
								<tr>
									<td>
										<a href="#" class="click-search-name" data-index="${i}">${resp.data[i].firstname} ${resp.data[i].lastname}</a>
									</td>
									<td>${resp.data[i].birthdate}</td>
									<td>${resp.data[i].address}</td>
								</tr>
							`;
						}
					}
					else {
						searchRow = `
							<tr>
								<td class="text-center" colspan="3">
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
		})


		$(document).on('click', '.click-search-name', function(e) {
			e.preventDefault();
			$('#modal-search-pregnant').modal('hide');
			$.loading.show({title: 'Loading...'});
			var ind = $(this).data('index');
			var father = dataSearchFound[ind].partner[0].father;
			var mother = dataSearchFound[ind];
			$('[name=last-name]').val(mother.lastname);
			$('[name=first-name]').val(mother.firstname);
			$('[name=middle-name]').val(mother.middlename);
			$('[name=civil-status]').val(mother.civil_status);
			$('[name=birthdate]').val(mother.birthdate);
			$('[name=age]').val(getAge(mother.birthdate));
			$('[name=address]').val(mother.address);
			$('[name=contact]').val(mother.contact);

			$('[name=father-last-name]').val(father.lastname);
			$('[name=father-first-name]').val(father.firstname);
			$('[name=father-middle-name]').val(father.middlename);
			$('[name=father-civil-status]').val(father.civil_status);
			$('[name=father-birthdate]').val(father.birthdate);
			$('[name=father-age]').val(getAge(father.birthdate));
			$('[name=father-address]').val(father.address);
			$('[name=father-contact]').val(father.contact);

			setTimeout(function() {
				$.loading.hide();
				$('#modal-add-baby').modal('show');
			}, 500);
		})


		// function focusHasError(error) {
		// 	var keys = {
		// 		'mother': ['address','age','birthdate','civil-status','contact','first-name','last-name','middle-name'],
		// 		'father': ['father-address','father-age','father-birthdate','father-contact','father-first-name','father-last-name','father-middle-name'],
		// 		'baby': ['baby-age','baby-birthdate','baby-birthorder','baby-birthplace','baby-born-at','baby-first-name','baby-gender','baby-last-name','baby-middle-name','baby-weight']
		// 	};

		// 	for (var key in keys) {
		// 		if (keys[key].indexOf(error) > -1) {
		// 			$(`.${key}-tab`).click();
		// 		}
		// 	}

		// }

		$(document).on('submit', '#add-baby-form', function(e) {
			e.preventDefault();

			if ( !confirm('Click OK to continue.') ) return false;

			// $.loading.show({title:'Saving data...'})

			var data = {};
			$(this).find('input, select').each(function(i, elem) {
				data[elem.name] = elem.value;
			});
			data['type'] = 'add';
			$.ajax({
				method: 'POST',
				url: "{{ route('children.store') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: data,
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==419) {

						for(var i in resp.errors) {
							// focusHasError(i);
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
						toastr.error('Failed to add pregnant, Found some errors.');
					}
					else if (resp.statusCode==302) {
						toastr.error('Failed to add record. ' + resp.errors);
					}
					else if (resp.statusCode==200) {
						$('#modal-add-baby').modal('hide');
						toastr.success(resp.message);
						if (confirm('Click OK to redirect child details.')) { 
							// window.location.href = '';
							console.log('Redirect to children location.')
						}
						getChildren();
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