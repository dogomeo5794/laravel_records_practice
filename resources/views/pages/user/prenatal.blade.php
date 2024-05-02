@extends('layouts.layout-1')

@section('head-title', 'Home')

@section('main-content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Prenatal Records</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Prenatal Records</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-5 col-md-4 col-lg-4">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <!-- <h3 class="card-title">About Me</h3> -->
            <button class="btn btn-xs btn-info btn-block btn-search-mother">
            	<i class="fas fa-search"></i> Search Mother
            </button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong class="mother-name-label"><i class="fas fa-user mr-1"></i> Mother Name</strong>
            <p class="text-muted m-name">------</p>
            <hr>

            <strong><i class="fas fa-calendar mr-1"></i> Birthdate</strong>
            <p class="text-muted m-birthdate">------</p>
            <hr>

            <strong><i class="fas fa-calendar mr-1"></i> Age</strong>
            <p class="text-muted m-age">------</p>
            <hr>

            <strong><i class="fas fa-envelope mr-1"></i> Contact</strong>
            <p class="text-muted m-contact">------</p>
            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
            <p class="text-muted m-address">------</p>
            <hr>

            <strong><i class="fas fa-users mr-1"></i> Civil Status</strong>
            <p class="text-muted m-civil-status">------</p>
            <hr>

            <strong><i class="fas fa-weight mr-1"></i> Weight</strong>
            <p class="text-muted m-weight">------</p>
            <hr>

            <strong><i class="fas fa-calendar mr-1"></i> Last Period</strong>
            <p class="text-muted m-last-period">------</p>
            <hr>

            <strong><i class="fas fa-calendar mr-1"></i> Estimated Confinement</strong>
            <p class="text-muted m-confinement">------</p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>


			<div class="col-sm-7 col-md-8 col-lg-8 prenatal-main-div">
				<div class="card card-outline card-primary card-prenatal-activities">
					<div class="card-header">
						<h3 class="card-title">Prenatal records</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive text-nowrap">
						<ul class="todo-list prenatal-activities" data-widget="todo-list">
							<li style="background: white;border-left-color: red;">
              	<span class="text">First Trimester</span>
              </li>
              <li class="t1 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t1-c1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Checkup</span>
                <!-- <a href="#" class="text checkup-link">1st Checkup</a> -->
              </li>
              <li class="t1 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t1-c2" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">2nd Checkup</span>
              </li>
              <li class="t1 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t1-c3" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">3rd Checkup</span>
              </li>


              <!-- <li>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="t1-c1" class="activity-checkbox"  checked="">
                  <label for="" style="cursor: default;"></label>
                </div>
                <span class="text">1st Checkup</span>
                <small class="badge badge-primary">
                	<i class="fas fa-check"></i> Done
                </small>
              </li>
              <li>
                <div class="icheck-primary empty d-inline ml-2">
                  <input type="checkbox" value="" name="t1-c2" class="activity-checkbox">
                  <label for="" style="cursor: default;"></label>
                </div>
                <span class="text">2nd Checkup</span>
                <small class="badge badge-danger">
                	<i class="fas fa-times"></i> No checkup records
                </small>
              </li>
              <li>
                <div class="icheck-primary waiting d-inline ml-2">
                  <input type="checkbox" value="" name="t1-c3" class="activity-checkbox">
                  <label for="" style="cursor: default;"></label>
                </div>
                <span class="text">3rd Checkup</span>
                <small class="badge badge-warning">
                	<i class="fas fa-clock"></i> Waiting for schedule
                </small>
              </li> -->

              <li style="background: white;border-left-color: red;">
              	<span class="text">Second Trimester</span>
              </li>
              <li class="t2 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t2-c1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Checkup</span>
              </li>
              <li class="t2 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t2-c2" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">2nd Checkup</span>
              </li>
              <li class="t2 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t2-c3" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">3rd Checkup</span>
              </li>

              <li style="background: white;border-left-color: red;">
              	<span class="text">Last Trimester</span>
              </li>
              <li class="t3 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t3-c1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Checkup</span>
              </li>
              <li class="t3 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t3-c2" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">2nd Checkup</span>
              </li>
              <li class="t3 waiting li-checkup">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="t3-c3" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">3rd Checkup</span>
              </li>

            </ul>
					</div>
					<!-- /.card-body -->
				</div>
				
			</div>
		</div>
		<!-- /.row -->
	</div>
</section>



<div class="modal fade" data-backdrop="static" id="modal-search-pregnant">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Search Mother</h5>
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
							<div class="col-12 table-responsive">
								<table class="table table-hover table-stripe text-nowrap">
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



<div class="modal fade" data-backdrop="static" id="modal-add-prenatal-activity">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Trimester Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="prenatal-activity-modal-body">
        <i class="fas fa-spin fa-spinner"></i> Loading...
      </div>
      <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="trimester-form" class="btn btn-primary btn-sm">
	          <i class="fas fa-check-circle"></i> 
	          Save Records
	        </button>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" data-backdrop="static" id="modal-record-labor">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Submit labor records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="record-labor-form">
					<div class="form-for-search-pregnant">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Labor Date</label>
									<input type="date" name="labor-date" value="{{ date('Y-m-d') }}" class="form-control" placeholder="First Name">
									<span class="error invalid-feedback"></span>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Remarks</label>
									<textarea name="remarks" value="" class="form-control">
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="record-labor-form" class="btn btn-primary btn-sm">
	          <i class="fas fa-check"></i> 
	          Save records
	        </button>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-review-records">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Review records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <!--  -->
      </div>
      <!-- <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="record-labor-form" class="btn btn-primary btn-sm">
	          <i class="fas fa-check"></i> 
	          Save records
	        </button>
	      </div>
      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection

@section('css-code')

@endsection

@section('script-code')
<script type="text/javascript">
	$(function() {

		$(document).on('click', '.activity-checkbox', function(e) {
			console.log('clicked');
			e.stopPropagation();
		})

		$(document).on('click', '.checkup-link', function(e) {
			e.preventDefault();
			$.loading.show({title:'Generating Forms...'});
			var that = this;
			var trimester = $(this).data('trimester');
			var checkup = $(this).data('checkup');
			var title = trimester+' Trimester - '+(checkup=='1'?'1st':(checkup=='2'?'2nd':'3rd'));
			var route = '';
			if (trimester=='1st') {
				route = "{{ route('trimester.first', ['checkup'=>'@t']) }}".replace('@t', checkup);
			}
			else if (trimester=='2nd') {
				route = "{{ route('trimester.second', ['checkup'=>'@t']) }}".replace('@t', checkup);
			}
			else {
				route = "{{ route('trimester.third', ['checkup'=>'@t']) }}".replace('@t', checkup);
			}

			$('#modal-add-prenatal-activity .modal-title').text(title+' Checkup');
      $('#modal-add-prenatal-activity button[type="submit"]').html(`
        <i class="fas fa-check-circle"></i> Save records
      `);
			$.get(route, {'type':'add'}).then(function(resp) {
				// console.log(resp);
				$('#modal-add-prenatal-activity').modal('show');
				$('#prenatal-activity-modal-body').html(resp);
				$('#trimester-form').data('checkup', $(that).data('checkup'));
				$('#trimester-form').data('trimester', $(that).data('trimester'));
        $('#trimester-form').data('type', 'add');
				$.loading.hide();
			})
			
		})

    $(document).on('click', '.edit-checkup', function(e) {
      e.preventDefault();
      $.loading.show({title:'Fetching records...'});
      var that = this;
      console.log($(this).data('checkup'));
      var trimester = $(this).data('trimester');
      var checkup = $(this).data('checkup');
      var title = trimester+' Trimester - '+(checkup=='1'?'1st':(checkup=='2'?'2nd':'3rd'));
      var route = '';
      if (trimester=='1st') {
        route = "{{ route('trimester.first', ['checkup'=>'@t']) }}".replace('@t', checkup);
      }
      else if (trimester=='2nd') {
        route = "{{ route('trimester.second', ['checkup'=>'@t']) }}".replace('@t', checkup);
      }
      else {
        route = "{{ route('trimester.third', ['checkup'=>'@t']) }}".replace('@t', checkup);
      }

      $('#modal-add-prenatal-activity .modal-title').text('[About to update records] - '+title+' Checkup');
      $('#modal-add-prenatal-activity button[type="submit"]').html(`
        <i class="fas fa-edit"></i> Update records
      `);
      $.get(route, {'type':'update', 'checkup':checkup}).then(function(resp) {
        // console.log(resp);
        $('#modal-add-prenatal-activity').modal('show');
        $('#prenatal-activity-modal-body').html(resp);
        $('#trimester-form').data('checkup', $(that).data('checkup'));
        $('#trimester-form').data('trimester', $(that).data('trimester'));
        $('#trimester-form').data('type', 'update');
        $.loading.hide();
      })
      
    })

		$(document).on('click', '.btn-search-mother', function() {
			$('#search-pregnant-row').html(`
				<tr>
					<td class="text-center" colspan="6">
						<i class="fas fa-exclamation-triangle"></i> No record found.
					</td>
				</tr>
			`);
			$('[name=search-first-name]').val('');
			$('[name=search-last-name]').val('');
			$('#modal-search-pregnant').modal('show');
		})

		var dataSearchFound = [];
		var activePregnant = null;
		var activeMother = null;
		var pregnantNo = null;
		$(document).on('submit', '#search-pregnant-form', function(e) {
			e.preventDefault();
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
					console.log(resp);
					var searchRow = '';
					if (resp.data.length > 0) {
						for(var i=0; i<resp.data.length; i++) {
							dataSearchFound[i] = resp.data[i];

							// <th>Last Period</th>
							// 			<th>Labor Date</th>
							// 			<th>Record Status</th>

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
		})

		$(document).on('click', '.click-search-name', function(e) {
			e.preventDefault();
			$('#modal-search-pregnant').modal('hide');
			
			var ind = $(this).data('index');
			getSelectedPregnant(ind);

		})

		const getSelectedPregnant = function(seclectedPregnant) {
			$.loading.show({title:'Query ['+seclectedPregnant+'], fetching data...'});
			$.ajax({
				method: 'POST',
				url: "{{ route('prenatal.search') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'pregnant-no': seclectedPregnant,
				},
				success: function(resp) {

					console.log(resp);

					if (resp.statusCode==404 || resp.statusCode==419) {
						toastr.error(resp.message);
						return false;
					}

					var prenatal = resp.data.prenatals;
					var mother = resp.data.mother;
					var pregnant = resp.data;
					activePregnant = resp.data.id;
					activeMother = mother.id;
					pregnantNo = resp.data.pregnant_no;
					console.log(mother)
					console.log(prenatal)

					$('.m-name').text(mother.firstname + ' ' + mother.middlename + ' ' + mother.lastname);
					$('.m-birthdate').text(mother.birthdate);
					$('.m-age').text(getAge(mother.birthdate));
					$('.m-contact').text(mother.contact);
					$('.m-address').text(mother.address);
					$('.m-civil-status').text(mother.civil_status);
					$('.m-weight').text(pregnant.weight);
					$('.m-last-period').text(pregnant.last_period);
					$('.m-confinement').text(pregnant.expected_delivery);

					$('.visit-profile-link').remove();
					$('.mother-name-label').append(`
						<a href="${'{{ route("pregnants.show", ["pregnant"=>"@pregnant"]) }}'.replace('@pregnant', mother.id)}" class="visit-profile-link" title="Visit profile" target="_blank">
		      		<i class="fas fa-link"></i>
		      	</a>
					`);

          $('.card-prenatal-activities .card-title').text(`
            ${pregnant.is_record_done?
              'Prenatal records - [Records Complete]':
              'Prenatal records - [On Process]'
            }
          `);

					console.log($('.prenatal-activities').find('.li-checkup').length);
					console.log($('.prenatal-activities').find('.li-checkup')[1]);

					$('.prenatal-activities .li-checkup').addClass('waiting').removeClass('empty');
					$('.prenatal-activities .li-checkup .tools').remove();
					$('.prenatal-activities .li-checkup .icheck-primary').remove();
					$('.prenatal-activities .li-checkup .badge').remove();
					$('.btn-prenatal-done').remove();



					var li_checkup = $('.prenatal-activities').find('.li-checkup');
					if ( !prenatal.length ) {
						console.log('no-prenatal');
						$('.prenatal-activities .li-checkup:first').removeClass('waiting');
						$('.prenatal-activities .li-checkup:first').prepend(`
							<div class="icheck-primary d-inline ml-2">
				        <input type="checkbox" value="" name="t1-c1" class="activity-checkbox">
				        <label for="" style="cursor: default;"></label>
				      </div>
						`)
						$('.prenatal-activities .li-checkup:first').append(`
							<small class="badge badge-warning">
              	<i class="fas fa-clock"></i> Waiting for schedule
              </small>
              ${pregnant.is_record_done?'':
					     	`<div class="tools">
			            <i class="fas fa-database checkup-link" data-checkup="1" data-trimester="1st" title="Record activity"></i> 
			            <i class="fas fa-file record-no-data" data-checkup="1" data-trimester="1st" title="Record No Data"></i>
			          </div>`
		        	}
				    `);

					}
					else {
						console.log('has-prenatal');
						var tri = {
							'1st': 't1',
							'2nd': 't2',
							'3rd': 't3'
						}
						var last_trimester = null;
						var last_checkup = null;
						for (var x=0; x<prenatal.length; x++) {
							last_trimester = prenatal[x].trimester;
							last_checkup = parseInt(prenatal[x].checkup_order);

							if (prenatal[x].record_status == 'with-data') {
								$(li_checkup[x]).removeClass('waiting');
								$(li_checkup[x]).find('.activity-checkbox:first').prop('checked', true);
								$(li_checkup[x]).prepend(`
									<div class="icheck-primary d-inline ml-2">
						        <input type="checkbox" value="" name="${tri[prenatal[x].trimester]}-c${prenatal[x].checkup_order}" class="activity-checkbox" checked>
						        <label for="" style="cursor: default;"></label>
						      </div>
								`)
								$(li_checkup[x]).append(`
									<small class="badge badge-primary">
	                	<i class="fas fa-check"></i> Done
	                </small>
	                <div class="tools">
		            	${pregnant.is_record_done?
			            	`<i class="fas fa-eye review-checkup" data-checkup=${prenatal[x].id} title="Review data."></i>`:
			            	`<i class="fas fa-edit edit-checkup" data-checkup="${prenatal[x].id}" data-trimester="${prenatal[x].trimester}" title="Update records"></i>`
			            }
				          </div>
						    `);
							}
							else {
								$(li_checkup[x]).removeClass('waiting');
								$(li_checkup[x]).prepend(`
									<div class="icheck-primary empty d-inline ml-2">
						        <input type="checkbox" value="" name="${tri[prenatal[x].trimester]}-c${prenatal[x].checkup_order}" class="activity-checkbox">
						        <label for="" style="cursor: default;"></label>
						      </div>
								`)
								$(li_checkup[x]).append(`
									<small class="badge badge-danger">
	                	<i class="fas fa-times"></i> No checkup records
	                </small>
	                <div class="tools">
		            	${pregnant.is_record_done?
			            	`<i class="fas fa-eye review-checkup" data-checkup=${prenatal[x].id} title="Review data."></i>`:
			            	`<i class="fas fa-edit edit-checkup" data-checkup="${prenatal[x].id}" data-trimester="${prenatal[x].trimester}" title="Update records"></i>`
			            }
				          </div>
						    `);
							}
						}

						if (prenatal.length < 9) {
							var t_check = t_data = null;
							if ( last_checkup == 3 ) {
								t_check = last_trimester=='1st'?'t2':(last_trimester=='2nd'?'t3':'t1');
								t_data = last_trimester=='1st'?'2nd':(last_trimester=='2nd'?'3rd':'1st');
							}
							else {
								t_check = last_trimester=='1st'?'t1':(last_trimester=='2nd'?'t2':'t3');
								t_data = last_trimester;
							}

							$(li_checkup[prenatal.length]).removeClass('waiting');
							$(li_checkup[prenatal.length]).prepend(`
								<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="${t_check}-c${last_checkup<3?(last_checkup+1):1}" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
							`)
							$(li_checkup[prenatal.length]).append(`
								<small class="badge badge-warning">
	              	<i class="fas fa-clock"></i> Waiting for schedule
	              </small>
	              ${pregnant.is_record_done?'':
						     	`<div class="tools">
				            <i class="fas fa-database checkup-link" data-checkup="${last_checkup<3?(last_checkup+1):1}" data-trimester="${t_data}" title="Record activity"></i> 
				            <i class="fas fa-file record-no-data" data-checkup="${last_checkup<3?(last_checkup+1):1}" data-trimester="${t_data}" title="Record No Data"></i>
				          </div>`
				         }
					    `);
						}
						else {
							if (!pregnant.is_record_done) {
								$('.card-prenatal-activities').closest('.prenatal-main-div').append(`
									<button class="btn btn-block btn-success btn-prenatal-done">
										<i class="fas fa-baby-carriage"></i> Record Labor to complete the prenatal. 
									</button>
								`);
							}

						}
					}

					$.loading.hide();

				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		}

    @if (isset($_GET['pregnant']))
    console.log("{{$_GET['pregnant']}}");
    getSelectedPregnant("{{$_GET['pregnant']}}");
    @endif

		$(document).on('click', '.record-no-data', function() {
			if ( !activePregnant ) { alert('Invalid data.'); return false; }

			if ( !confirm('Are you sure to record this prenatal activity as empty data?') ) return false;
			$.loading.show({title:'Saving the records...'});
			var checkup = $(this).data('checkup');
			var trimester = $(this).data('trimester');
			console.log(checkup);
			console.log(trimester);
			$.ajax({
				method: 'POST',
				url: "{{ route('prenatal.store') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'record-type': 'no-data',
					'mother': activeMother,
					'pregnant': activePregnant,
					'checkup': checkup,
					'trimester': trimester,
          'type': 'add'
				},
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==200) {
						toastr.success(resp.message);
						getSelectedPregnant(pregnantNo);
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		})

		$(document).on('submit', '#trimester-form', function(e) {
			e.preventDefault();
			$('.is-invalid').removeClass('is-invalid');
			$('.error').remove();

			var column = {};
			$(this).find('input, select, .on-get-editor').each(function(i, elem) {
				if ($(elem).prop('tagName').toLowerCase()=='div') {
					column[$(elem).attr('name')] = $(elem).html().trim('')=='...'?'':$(elem).html().trim('');
				}
				else if (elem.type == 'checkbox') {
					column[elem.name] = $(elem).prop('checked');
				}
				else {
					column[elem.name] = elem.value;
				}
			});

      if ( !confirm('Click OK to continue.') ) return false;

			$.loading.show({title:'Saving the records...'});

			var checkup = $(this).data('checkup');
			var trimester = $(this).data('trimester');
			console.log(checkup);
			console.log(trimester);

			column['record-type'] = 'with-data';
			column['mother'] = activeMother;
			column['pregnant'] = activePregnant;
			column['checkup'] = checkup;
      column['trimester'] = trimester;
			column['type'] = $(this).data('type');

			$.ajax({
				method: 'POST',
				url: "{{ route('prenatal.store') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: column,
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==200) {
						$('#modal-add-prenatal-activity').modal('hide');
						toastr.success(resp.message);
						getSelectedPregnant(pregnantNo);
					}
					else if (resp.statusCode==419) {
						for(var e in resp.errors) {
							$(`[name="${e}"]`).addClass('is-invalid');
							$(`[name="${e}"]`).closest('.form-group').append(`
								<span class="error invalid-feedback">${resp.errors[e][0]}</span>
							`);
						}
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		})

		$(document).on('click', '.btn-prenatal-done', function(e) {
			$('#record-labor-form').find('[name="labor-date"]:first').val("{{ date('Y-m-d') }}");
			$('#record-labor-form').find('[name="remarks"]:first').val("");
			$('#record-labor-form').find('[name="labor-date"]:first').removeClass('is-invalid');
			$('#record-labor-form').find('.error:first').text('');
			$('#modal-record-labor').modal('show');
		})

		$(document).on('submit', '#record-labor-form', function(e) {
			e.preventDefault();
			if (pregnantNo==null) { toastr.error('Invalid data.'); return false; }
			if ( !confirm('Click OK to continue.') ) return false;
			var columns = {};
			$(this).find('input, textarea').each(function(i, elem) {
				columns[elem.name] = elem.value;
			})
			columns['pregnant-no'] = pregnantNo;

			$.loading.show({title:'Processing...'});

			$.ajax({
				method: 'POST',
				url: "{{ route('prenatal.done') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: columns,
				success: function(resp) {
					if (resp.statusCode==419) {
						toastr.error(resp.message);
						$('#record-labor-form').find('[name="labor-date"]:first').addClass('is-invalid').focus();
						$('#record-labor-form').find('.error:first').text(resp.errors['labor-date'][0]);
					}
					else {
						getSelectedPregnant(pregnantNo);
						pregnantNo = null;
						$('#modal-record-labor').modal('hide');
						toastr.success(resp.message);
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					toastr.error('System error. Contact your admin to fix the problem.');
					console.log(err);
				}
			})
		})

		$(document).on('click', '.review-checkup', function(e) {
			var checkup = $(this).data('checkup');
			console.log(checkup);
      $.loading.show({title:'Please wait...'});
			$.ajax({
				method: 'GET',
				url: "{{ route('prenatal.show',['prenatal'=>'@prenatal']) }}".replace('@prenatal', checkup),
				data: {
					'request-type': 'review'
				},
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==200) {
						$('#modal-review-records').modal('show');
						$('#modal-review-records').find('.modal-body:first').html(resp.html);
					}
          else {
            toastr.error(resp.message);
          }
          $.loading.hide();
				},
				error: function(err) {
          $.loading.hide();
					console.log(err);
				}
			})
		})

	})
</script>
@endsection