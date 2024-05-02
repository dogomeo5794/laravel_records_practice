@extends('layouts.layout-1')

@section('head-title', 'Home')

@section('main-content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Immunization Records</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Immunization Records</li>
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
            	<i class="fas fa-search"></i> Search Children
            </button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong class="mother-name-label"><i class="fas fa-user mr-1"></i> Child Name</strong>
            <p class="text-muted m-name">------</p>
            <hr>

            <strong><i class="fas fa-calendar mr-1"></i> Birthdate</strong>
            <p class="text-muted m-birthdate">------</p>
            <hr>

            <strong><i class="fas fa-users mr-1"></i> Gender</strong>
            <p class="text-muted m-gender">------</p>
            <hr>

            <strong><i class="fas fa-weight mr-1"></i> Birth Weight</strong>
            <p class="text-muted m-birth-weight">------</p>
            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Plase of Birth</strong>
            <p class="text-muted m-place-of-birth">------</p>
            <hr>

            <strong><i class="fas fa-hospital mr-1"></i> Born At</strong>
            <p class="text-muted m-born-at">------</p>
            <hr>

            <strong><i class="fas fa-calendar mr-1"></i> Mother Name</strong>
            <p class="text-muted m-mother-name">------</p>
            <hr>

            <strong><i class="fas fa-envelope mr-1"></i> Contact</strong>
            <p class="text-muted m-mother-contact">------</p>
            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
            <p class="text-muted m-mother-address">------</p>
            <hr>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>


			<div class="col-sm-7 col-md-8 col-lg-8 immunize-main-div">
				<div class="card card-outline card-primary card-immunize-activities">
					<div class="card-header">
						<h3 class="card-title">Records</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive text-nowrap">
						<ul class="todo-list prenatal-activities" data-widget="todo-list">
							<li style="background: white;border-left-color: red;">
              	<span class="text">BCG</span>
              </li>
              <li class="waiting li-checkup bcg-1st" data-activity="bcg" data-dose="1st">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="bcg-d1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Dose</span>
                <!-- <a href="#" class="text checkup-link">1st Checkup</a> -->
              </li>
              <li style="background: white;border-left-color: red;">
              	<span class="text">HEPATITIS B</span>
              </li>
              <li class="waiting li-checkup hepab-1st" data-activity="hepab" data-dose="1st">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="hepab-d1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Dose</span>
              </li>
              <li style="background: white;border-left-color: red;">
              	<span class="text">PENTAVALENT VACCINE (DPT-Hep B-HiB)</span>
              </li>
              <li class="waiting li-checkup pv-1st" data-activity="pv" data-dose="1st">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="pv-d1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Dose</span>
              </li>
              <li class="waiting li-checkup pv-2nd" data-activity="pv" data-dose="2nd">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="pv-d2" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">2nd Dose</span>
              </li>
              <li class="waiting li-checkup pv-3rd" data-activity="pv" data-dose="3rd">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="pv-d3" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">3rd Dose</span>
              </li>
              <li style="background: white;border-left-color: red;">
              	<span class="text">ORAL POLIO VACCINE (OPV)</span>
              </li>
              <li class="waiting li-checkup opv-1st" data-activity="opv" data-dose="1st">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="opv-d1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Dose</span>
              </li>
              <li class="waiting li-checkup opv-2nd" data-activity="opv" data-dose="2nd">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="opv-d2" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">2nd Dose</span>
              </li>
              <li class="waiting li-checkup opv-3rd" data-activity="opv" data-dose="3rd">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="opv-d3" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">3rd Dose</span>
              </li>
              <li style="background: white;border-left-color: red;">
              	<span class="text">INACTIVE POLIO VACCINE (IPV)</span>
              </li>
              <li class="waiting li-checkup ipv-1st" data-activity="ipv" data-dose="1st">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="ipv-d1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Dose</span>
              </li>
              <li style="background: white;border-left-color: red;">
              	<span class="text">PNEUMOCOCCAL CONJUGATE VACCINE (PCV)</span>
              </li>
              <li class="waiting li-checkup pcv-1st" data-activity="pcv" data-dose="1st">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="pcv-d1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Dose</span>
              </li>
              <li class="waiting li-checkup pcv-2nd" data-activity="pcv" data-dose="2nd">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="pcv-d2" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">2nd Dose</span>
              </li>
              <li class="waiting li-checkup pcv-3rd" data-activity="pcv" data-dose="3rd">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="pcv-d3" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">3rd Dose</span>
              </li>
              <li style="background: white;border-left-color: red;">
              	<span class="text">MEASLES, MUMPS, RUBELLA (MMR)</span>
              </li>
              <li class="waiting li-checkup mmr-1st" data-activity="mmr" data-dose="1st">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="mmr-d1" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">1st Dose</span>
              </li>
              <li class="waiting li-checkup mmr-2nd" data-activity="mmr" data-dose="2nd">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="mmr-d2" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">2nd Dose</span>
              </li>
              <li style="background: white;border-left-color: red;">
              	<span class="text">Other</span>
              </li>
              <li class="waiting li-checkup other" data-activity="other" data-dose="">
              	<div class="icheck-primary d-inline ml-2">
					        <input type="checkbox" value="" name="other-vaccine" class="activity-checkbox">
					        <label for="" style="cursor: default;"></label>
					      </div>
                <span class="text">Other Vaccine</span>
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



<div class="modal fade" data-backdrop="static" id="modal-search-child">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Search Child</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="search-child-form">
					<div class="form-for-search-child">
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
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="search-child-form" class="btn btn-primary btn-sm">
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



<div class="modal fade" data-backdrop="static" id="modal-add-immunize-activity">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Trimester Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="immunize-activity-modal-body">
        <i class="fas fa-spin fa-spinner"></i> Loading...
      </div>
      <div class="modal-footer">
        <div class="float-right">
	        <button type="submit" form="immunization-form" class="btn btn-primary btn-sm">
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


<div class="modal fade" data-backdrop="static" id="modal-record-mark-complete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mark as Complete Immunization Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="record-complete-immunize-form">
					<div class="form-for-search-child">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Complete Date</label>
									<input type="date" name="complete_date" value="{{ date('Y-m-d') }}" class="form-control">
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
	        <button type="submit" form="record-complete-immunize-form" class="btn btn-primary btn-sm">
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
	        <button type="submit" form="record-complete-immunize-form" class="btn btn-primary btn-sm">
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

		const vaccine_key = {
			'bcg': 'BCG',
			'hepab': 'HEPATITIS B',
			'pv': 'PENTAVALENT VACCINE (DPT-Hep B-HiB)',
			'opv': 'ORAL POLIO VACCINE (OPV)',
			'ipv': 'INACTIVE POLIO VACCINE (IPV)',
			'pcv': 'PNEUMOCOCCAL CONJUGATE VACCINE (PCV)',
			'mmr': 'MEASLES, MUMPS, RUBELLA (MMR)',
			'other': 'Other'
		}

		$(document).on('click', '.activity-checkbox', function(e) {
			console.log('clicked');
			e.stopPropagation();
		})

		$(document).on('click', '.checkup-link', function(e) {
			e.preventDefault();
			$.loading.show({title:'Generating Forms...'});
			var that = this;
			var act = $(this).data('activity');
			var dose = $(this).data('dose');
			var title = vaccine_key[act]+' - '+dose+' Dose';
			var route = "{{ route('immunization.edit', ['immunization'=>rand(111111, 999999)]) }}";

			var column = {
				'rtype': 'generate-forms',
				'dose': dose,
				'act': act,
				'title': vaccine_key[act]
			}

			$('#modal-add-immunize-activity .modal-title').text(title+' Immunization');
      $('#modal-add-immunize-activity button[type="submit"]').html(`
        <i class="fas fa-check-circle"></i> Save records
      `);
			$.get(route, column).then(function(resp) {
				// console.log(resp);
				$('#modal-add-immunize-activity').modal('show');
				$('#immunize-activity-modal-body').html(resp);
				$('#immunization-form').data('activity', act);
				$('#immunization-form').data('dose', dose);
        $('#immunization-form').data('rtype', 'add-immunize');
        $('#immunization-form').data('is_other', act);
				$.loading.hide();
			})
			
		})

    $(document).on('click', '.edit-immunize', function(e) {
      e.preventDefault();
      $.loading.show({title:'Fetching records...'});
      var that = this;
			var immunize = $(this).data('immunize');
			var route = "{{ route('immunization.edit', ['immunization'=>'@id']) }}".replace('@id', immunize);

			var column = {
				'rtype': 'for-edit',
				'immunize': immunize
			}

      
      $('#modal-add-immunize-activity button[type="submit"]').html(`
        <i class="fas fa-edit"></i> Update records
      `);
      $.get(route, column).then(function(resp) {
        console.log(resp);
        if (resp.statusCode==404) {
        	toastr.error(resp.message);
        }
        else {
	        var data = JSON.parse(resp.data.data);
					var title = data.vaccine_title+' - '+data.vaccine_dose+' Dose';
	        $('#modal-add-immunize-activity .modal-title').text('[About to update records] - '+title+' Checkup');
	        $('#modal-add-immunize-activity').modal('show');
	        $('#immunize-activity-modal-body').html(resp.html);
	        $('#immunization-form').data('rtype', 'update');
	        $('#immunization-form').data('immunize', resp.data.id);
	        $('#immunization-form').data('activity', data.tags);
					$('#immunization-form').data('dose', data.vaccine_dose);
	        $('#immunization-form').data('is_other', vaccine_key[data.tags]==undefined?'other':data.tags);
      	}
        $.loading.hide();
      })
      
    })

		$(document).on('click', '.btn-search-mother', function() {
			$('#search-child-row').html(`
				<tr>
					<td class="text-center" colspan="6">
						<i class="fas fa-exclamation-triangle"></i> No record found.
					</td>
				</tr>
			`);
			$('[name=search-first-name]').val('');
			$('[name=search-last-name]').val('');
			$('#modal-search-child').modal('show');
		})

		var dataSearchFound = [];
		var activeImmunize = null;
		var activeChild = null;
		var activeChildInfo = null;
		$(document).on('submit', '#search-child-form', function(e) {
			e.preventDefault();
			$('#search-child-row').html(`
				<tr>
					<td class="text-center" colspan="6">
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
					console.log(resp);
					var searchRow = '';
					if (resp.data.length > 0) {
						for(var i=0; i<resp.data.length; i++) {
							dataSearchFound[i] = resp.data[i];

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
		})

		$(document).on('click', '.click-search-name', function(e) {
			e.preventDefault();
			$('#modal-search-child').modal('hide');
			
			var ind = $(this).data('index');
			var info = $(this).data('info');
			getSelectedChild(ind, info);

		})

		const resetImmunizeElement = function(child={is_record_done:false}) {
			$('.prenatal-activities .li-checkup').addClass('waiting').removeClass('empty');
			$('.prenatal-activities .li-checkup .icheck-primary').remove();
			$('.prenatal-activities .li-checkup .tools').remove();
			$('.prenatal-activities .li-checkup .badge').remove();
			$('.btn-immunize-done').remove();

			$('.prenatal-activities .li-checkup').each(function(i, elem) {
				var act = $(elem).data('activity');
				var dose = $(elem).data('dose');
				$(elem).prepend(`
					<div class="icheck-primary d-inline ml-2">
		        <input type="checkbox" name="${act}-${dose}" class="activity-checkbox">
		        <label for="" style="cursor: default;"></label>
		      </div>
				`)

				$(elem).append(`
					${$(elem).hasClass('other')?'':
						`<small class="badge badge-warning">
            	<i class="fas fa-clock"></i> Waiting for schedule
            </small>`
        	}
          ${child.is_record_done?'':
			     	`<div class="tools">
	            <i class="fas fa-database checkup-link" data-activity="${act}" data-dose="${dose}" title="Record activity"></i> 
	            ${act=='other'?'':
	            	`<i class="fas fa-file record-no-data" data-activity="${act}" data-dose="${dose}" title="Record No Data"></i>`
	          	}
	          </div>`
        	}
		    `);
		  });
		}


		const getSelectedChild = function(seclectedChild, info=null) {
			$.loading.show({title:'Query ['+info+'], fetching data...'});
			$.ajax({
				method: 'GET',
				url: "{{ route('children.show', ['child' => '@id']) }}".replace('@id', seclectedChild),
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'rtype': 'selected',
				},
				success: function(resp) {

					console.log(resp);

					if (resp.statusCode==404 || resp.statusCode==419) {
						toastr.error(resp.message);
						return false;
					}

					var immunize = resp.data.immunizations;
					var mother = resp.data.parent.mother;
					var child = resp.data;
					activeChild = resp.data.id;
					activeChildInfo = child.firstname+" "+child.lastname;
					activeMother = mother.id;

					$('.m-name').text(child.firstname + ' ' + child.middlename + ' ' + child.lastname);
					$('.m-birthdate').text(child.birthdate);
					$('.m-age').text(getBabyAge(child.birthdate));
					$('.m-gender').text(child.gender);
					$('.m-birth-weight').text(child.born_weight);
					$('.m-place-of-birth').text(child.born_place);
					$('.m-born-at').text(child.born_at);
					$('.m-mother-name').text(mother.firstname+" "+mother.lastname);
					$('.m-mother-contact').text(mother.contact);
					$('.m-mother-address').text(mother.address);

					$('.visit-profile-link').remove();
					$('.mother-name-label').append(`
						<a href="${'{{ route("children.show", ["child"=>"@id"]) }}'.replace('@id', child.id)}" class="visit-profile-link" title="Visit profile" target="_blank">
		      		<i class="fas fa-link"></i>
		      	</a>
					`);

          $('.card-immunize-activities .card-title').text(`
            ${child.is_record_done?
              'Immunization records - [Records Complete]':
              'Immunization records - [On Process]'
            }
          `);

					resetImmunizeElement(child);

					var li_checkup = $('.prenatal-activities').find('.li-checkup');
					if (immunize.length) {
						console.log('has-immunize');

						for (var x=0; x<immunize.length; x++) {
							var data = JSON.parse(immunize[x].data);
							var dose = data.vaccine_dose;
							var tags = data.tags;

							var cls = vaccine_key[tags]==undefined?'other':(tags+'-'+dose);
							var targetElem = $(`.${cls}`);

							$(`.prenatal-activities .li-checkup.${cls} .icheck-primary`).remove();
							$(`.prenatal-activities .li-checkup.${cls} .tools`).remove();
							$(`.prenatal-activities .li-checkup.${cls} .badge`).remove();

							if (immunize[x].record_status == 'with-data') {
								targetElem.removeClass('waiting');
								targetElem.prepend(`
									<div class="icheck-primary d-inline ml-2">
						        <input type="checkbox" value="" name="${tags}-${dose}" class="activity-checkbox" checked>
						        <label for="" style="cursor: default;"></label>
						      </div>
								`)
								targetElem.append(`
									<small class="badge badge-primary">
	                	<i class="fas fa-check"></i> Done
	                </small>
	                <div class="tools">
		            	${child.is_record_done?
			            	`<i class="fas fa-eye immunize-checkup" data-immunize=${immunize[x].id} title="Review data."></i>`:
			            	`<i class="fas fa-edit edit-immunize" data-immunize="${immunize[x].id}" title="Update records"></i>`
			            }
				          </div>
						    `);
							}
							else {
								targetElem.removeClass('waiting');
								targetElem.prepend(`
									<div class="icheck-primary empty d-inline ml-2">
						        <input type="checkbox" value="" name="${tags}-${dose}" class="activity-checkbox">
						        <label for="" style="cursor: default;"></label>
						      </div>
								`)
								targetElem.append(`
									<small class="badge badge-danger">
	                	<i class="fas fa-times"></i> No vaccine records
	                </small>
	                <div class="tools">
		            	${child.is_record_done?
			            	`<i class="fas fa-eye immunize-checkup" data-immunize=${immunize[x].id} title="Review data."></i>`:
			            	`<i class="fas fa-edit edit-immunize" data-immunize="${immunize[x].id}" title="Update records"></i>`
			            }
				          </div>
						    `);
							}
						}

						if (!child.is_record_done && immunize.length >= 14) {
							$('.card-immunize-activities').closest('.immunize-main-div').append(`
								<button class="btn btn-block btn-success btn-immunize-done">
									<i class="fas fa-baby-carriage"></i> Mark as Complete Immunization. 
								</button>
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
		}

    @if (isset($_GET['child']) AND isset($_GET['info']))
    getSelectedChild("{{$_GET['child']}}", "{{$_GET['info']}}");
    @endif

		$(document).on('click', '.record-no-data', function() {
			if ( !activeChild ) { alert('Invalid data.'); return false; }

			if ( !confirm('Are you sure to record this immunization with empty data?') ) return false;
			$.loading.show({title:'Saving the records...'});
			var act = $(this).data('activity');
			var dose = $(this).data('dose');
			console.log(act);
			console.log(vaccine_key[act]);
			console.log(dose);
			$.ajax({
				method: 'POST',
				url: "{{ route('immunization.store') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					'record-type': 'no-data',
					'child': activeChild,
					'tags': act,
					'dose': dose,
					'vaccine': vaccine_key[act],
          'type': 'add-immunize'
				},
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==200) {
						toastr.success(resp.message);
						getSelectedChild(activeChild, activeChildInfo);
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		})

		$(document).on('submit', '#immunization-form', function(e) {
			e.preventDefault();
			$('.is-invalid').removeClass('is-invalid');
			$('.error').remove();
			$('.baby-age-group').css({'border': 'none'});

			var column = {};
			$(this).find('input, select, textarea').each(function(i, elem) {
				if ($(elem).prop('tagName').toLowerCase()=='div') {
					column[$(elem).attr('name')] = $(elem).html().trim('')=='...'?'':$(elem).html().trim('');
				}
				else if (elem.type == 'checkbox' || elem.type == 'radio') {
					column[elem.name] = $(`input[name="${elem.name}"]:checked`).val();
				}
				else {
					column[elem.name] = elem.value;
				}
			});

      if ( !confirm('Click OK to continue.') ) return false;

			$.loading.show({title:'Saving the records...'});

			var tags = $(this).data('activity');
			var dose = $(this).data('dose');
			var rtype = $(this).data('rtype');

			column['record-type'] = 'with-data';
			column['child'] = activeChild;
			column['type'] = rtype;
			column['is_other'] = $(this).data('is_other')=='other'?true:false;
			if (rtype=='update') {
				column['immunize'] = $(this).data('immunize');
			}

			$.ajax({
				method: 'POST',
				url: "{{ route('immunization.store') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: column,
				success: function(resp) {
					console.log(resp);
					if (resp.statusCode==200) {
						$('#modal-add-immunize-activity').modal('hide');
						toastr.success(resp.message);
						getSelectedChild(activeChild, activeChildInfo);
					}
					else if (resp.statusCode==419) {
						for(var e in resp.errors) {
							if (e=='baby-age') {
								$('.baby-age-group').css({'border': '1px solid red'});
								$('.baby-age-group').append(`
									<span class="error invalid-feedback" style="display:block!important">${resp.errors[e][0]}</span>
								`);
							}
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

		$(document).on('click', '.btn-immunize-done', function(e) {
			$('#record-complete-immunize-form').find('[name="complete_date"]:first').val("{{ date('Y-m-d') }}");
			$('#record-complete-immunize-form').find('[name="remarks"]:first').val("");
			$('#record-complete-immunize-form').find('[name="complete_date"]:first').removeClass('is-invalid');
			$('#record-complete-immunize-form').find('.error:first').text('');
			$('#modal-record-mark-complete').modal('show');
		})

		$(document).on('submit', '#record-complete-immunize-form', function(e) {
			e.preventDefault();
			if (activeChild==null) { toastr.error('Invalid data.'); return false; }
			if ( !confirm('Click OK to continue.') ) return false;
			var columns = {};
			$(this).find('input, textarea').each(function(i, elem) {
				columns[elem.name] = elem.value;
			})
			columns['child'] = activeChild;
			columns['rtype'] = 'mark-record-done';

			$.loading.show({title:'Processing...'});

			$.ajax({
				method: 'PUT',
				url: "{{ route('children.update', ['child'=>'@id']) }}".replace('@id', activeChild),
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: columns,
				success: function(resp) {
					console.log(resp);

					if (resp.statusCode==419) {
						toastr.error(resp.message);
						$('#record-complete-immunize-form').find('[name="complete_date"]:first').addClass('is-invalid').focus();
						$('#record-complete-immunize-form').find('.error:first').text(resp.errors['complete_date'][0]);
					}
					else {
						getSelectedChild(activeChild, activeChildInfo);
						pregnantNo = null;
						$('#modal-record-mark-complete').modal('hide');
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

		$(document).on('click', '.immunize-checkup', function(e) {
			var immunize = $(this).data('immunize');
			console.log(immunize);
      $.loading.show({title:'Please wait...'});
			$.ajax({
				method: 'GET',
				url: "{{ route('immunization.show',['immunization'=>'@id']) }}".replace('@id', immunize),
				data: {
					'rtype': 'review'
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