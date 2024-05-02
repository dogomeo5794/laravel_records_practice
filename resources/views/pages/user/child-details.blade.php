
@extends('layouts.layout-1')

@section('head-title', 'Child Information')

@section('main-footer')
@endsection

@section('css-code')
<style type="text/css">
	dd {
		border-bottom: 1px solid lightgrey !important;
    padding-bottom: 10px !important;
    position: relative;
	}
	.maximized-card .immunize-basic, .maximized-card .card-footer {
		display: none;
	}
	.maximized-card .view-all-records {
		display: inline-block !important;
	}

</style>
@endsection


@section('main-content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Child Information</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Child</li>
					<li class="breadcrumb-item active">Information</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">

		@php
			$lastVaccine = $data->immunizations()->max('date_conduct');
		@endphp
		
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
				<div class="card card-primary card-outline edit-child-card">
					<div class="card-header">
						<h3 class="card-title">Child with immunization records</h3>
						<div class="card-tools">
							<a href="javascript:void(0)" class="text-sm edit-child-info">Edit</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<dl>
							<dt>Last Name</dt>
	            <dd class="child_last_name">
	            	{{ ucfirst($data->lastname) }}
	            </dd>
	            <dt>First Name</dt>
	            <dd class="child_first_name">{{ ucfirst($data->firstname) }}</dd>
	            <dt>Middle Name</dt>
	            <dd class="child_middle_name">{{ ucfirst($data->middlename) }}</dd>
	            <dt>Birthday</dt>
	            <dd class="child_birthday">{{ date('M d, Y', strtotime($data->birthdate)) }}</dd>
	            <dt>Age</dt>
	            <dd class="child_age">{{ getAge($data->birthdate, 'default') }}</dd>
	            <dt>Birth Weight (grams)</dt>
	            <dd class="child_birth_weight">{{ $data->born_weight }}</dd>
	            <dt>Gender</dt>
	            <dd class="child_gender">{{ $data->gender }}</dd>
	            <dt>Birth Order</dt>
	            <dd class="child_birth_order">{{ $data->birth_order }}</dd>
	            <dt>Place of Birth</dt>
	            <dd class="child_place_of_birth">{{ $data->born_place }}</dd>
	            <dt>Born at (e.g Hospital, Hilot, and etc.)</dt>
	            <dd class="child_born_at">{{ $data->born_at }}</dd>
	          </dl>
					</div>
					
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
				<div class="card card-primary card-outline parent-info-card">
					<div class="card-header">
						<h3 class="card-title">Parent</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<dl>
              <dt>Mother Name</dt>
              <dd>
              	{{ ucfirst($data->parent->mother->firstname) }} 
              	{{ ucfirst($data->parent->mother->lastname) }}
              </dd>
              <dt>Address</dt>
              <dd>{{ $data->parent->mother->address }}</dd>
              <dt>Contact</dt>
              <dd>{{ $data->parent->mother->contact }}</dd>
            </dl>
					</div>
					<div class="card-footer">
						<a href="{{ route('pregnants.show', ['pregnant'=>$data->parent->mother->id]) }}" class="btn btn-danger btn-xs" style="color: #fff">
          		Visit Records
          	</a>
					</div>

				</div>

				<div class="card card-danger immunize-card">
          <div class="card-header">
            <h3 class="card-title">
            	Immunizations Records
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="overflow-y: auto;">
          	<div class="view-all-records" style="display: none;">
          		<div class="row">
								<div class="col-12 mx-auto table-responsive">
									<style type="text/css">
										.tbl-v-center td, .tbl-v-center th {
											vertical-align: middle;
										}
									</style>
									<table class="table table-bordered tbl-v-center" style="table-layout: fixed;background-color: #fff">
										<thead class="bg-info">
											<th style="width: 250px;">Vaccine</th>
											<th style="width: 150px;">Doses</th>
											<th style="width: 300px;" colspan="6">Vaccination Date</th>
											<th style="min-width: 90px;width: 150px;">Remarks</th>
										</thead>
										<tbody>

											@php
												$bcg = filterJsonData($data->immunizations, 'bcg');
												$hepab = filterJsonData($data->immunizations, 'hepab');
												$pv = filterJsonData($data->immunizations, 'pv');
												$opv = filterJsonData($data->immunizations, 'opv');
												$ipv = filterJsonData($data->immunizations, 'ipv');
												$pcv = filterJsonData($data->immunizations, 'pcv');
												$mmr = filterJsonData($data->immunizations, 'mmr');
												$other = filterJsonData($data->immunizations, 'other');
											@endphp
											<tr>
												<td>BCG</td>
												<td class="text-center">1<br>Just Born</td>
												<td class="text-center" colspan="6">
													{{ getVaccineDate($bcg, 0, '----') }}
												</td>
												<td>{!! $bcg?implode('', $bcg['remarks']):'' !!}</td>
											</tr>
											<tr>
												<td>HEPATITIS B</td>
												<td class="text-center">
													1<br>
													Just Born
												</td>
												<td class="text-center" colspan="6" class="text-center">
													{{ getVaccineDate($hepab, 0, '----') }}
												</td>
												<td>{!! $hepab?implode('', $hepab['remarks']):'' !!}</td>
											</tr>
											<tr>
												<td>PENTAVALENT VACCINE (DPT-Hep B-HiB)</td>
												<td class="text-center">
													3<br>
													(1 1/2, 2 1/2 & 3 1/2 Months)
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($pv, 0, '----') }}
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($pv, 1, '----') }}
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($pv, 2, '----') }}
												</td>
												<td>{!! $pv?implode('', $pv['remarks']):'' !!}</td>
											</tr>
											<tr>
												<td>ORAL POLIO VACCINE (OPV)</td>
												<td class="text-center">
													3<br>
													(1 1/2, 2 1/2 & 3 1/2 Months)
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($opv, 0, '----') }}
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($opv, 1, '----') }}
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($opv, 2, '----') }}
												</td>
												<td>{!! $opv?implode('', $opv['remarks']):'' !!}</td>
											</tr>
											<tr>
												<td>INACTIVE POLIO VACCINE (IPV)</td>
												<td class="text-center">
													1<br>
													(3 1/2 Months)
												</td>
												<td class="text-center" colspan="6">
													{{ getVaccineDate($ipv, 0, '----') }}
												</td>
												<td>{!! $ipv?implode('', $ipv['remarks']):'' !!}</td>
											</tr>
											<tr>
												<td>PNEUMOCOCCAL CONJUGATE VACCINE (PCV)</td>
												<td class="text-center">
													3<br>
													(1 1/2, 2 1/2 & 3 1/2 Months)
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($pcv, 0, '----') }}
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($pcv, 1, '----') }}
												</td>
												<td class="text-center" colspan="2">
													{{ getVaccineDate($pcv, 2, '----') }}
												</td>
												<td>{!! $pcv?implode('', $pcv['remarks']):'' !!}</td>
											</tr>
											<tr>
												<td>MEASLES, MUMPS, RUBELLA (MMR)</td>
												<td class="text-center">
													2<br>
													(9 Months & 1 Year)
												</td>
												<td class="text-center" colspan="3">
													{{ getVaccineDate($mmr, 0, '----') }}
												</td>
												<td class="text-center" colspan="3">
													{{ getVaccineDate($mmr, 1, '----') }}
												</td>
												<td>{!! $mmr?implode('', $mmr['remarks']):'' !!}</td>
											</tr>
											<tr>
												<td>{{ $other?$other['vaccine_title']:'Other' }}</td>
												<td class="text-center">
													{{ $other?count($other['baby_age']):'----' }}
													<br>
													{{ $other?'('.implode(', ', $other['baby_age']).')':'' }}
												</td>
												<td class="text-center" colspan="6">
													{{ getVaccineDate($other, 0, '----') }}
												</td>
												<td>{!! $other?implode('', $other['remarks']):'' !!}</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div> 
          	</div>

          	<div class="immunize-basic">
	            <dl>
	            	<dt>Immunize Status</dt>
	            	<dd>{{ $data->is_record_done?"Records Complete":"Under Monitoring" }}</dd>
	            	<dt>Last Vaccine Taken</dt>
	            	<dd>
	            		{{ $lastVaccine?(empty($lastVaccine)?'----':date('M d, Y', strtotime($lastVaccine))):'----' }}
	            	</dd>
	            </dl>
	          </div>
          </div>
          <div class="card-footer">
						<button class="btn btn-danger btn-xs btn-on-see-more">
          		View all records
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
		$(document).on('click', '.btn-on-see-more', function(e) {
			$('[data-card-widget="maximize"]').click();
		})

		$(document).on('click', '.edit-child-info', function(e) {
			$.loading.show({title:'Fetching records...'});
			$('.x-field').remove();
			$.ajax({
				method: 'GET',
				url: "{{ route('children.edit', ['child' => $data->id]) }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').data('content')
				},
				data: {},
				success: function(resp) {
					// console.log(resp);
					for (var col in resp) {
						$(`.${col}`).append(resp[col]);
					}

					$('.edit-child-info').hide();

					$('.edit-child-card').append(`
						<div class="card-footer">
							<button class="btn btn-xs btn-danger btn-cancel-edit">
								<i class="fas fa-times-circle"></i> Cancel
							</button>
							<button class="btn btn-xs btn-info btn-save-update">
								<i class="fas fa-check-circle"></i> Save Changes
							</button>
						</div>
					`);

					$('.parent-info-card, .immunize-card').append(`
						<div class="overlay" style="cursor: not-allowed;">
							<i class="fas fa-2x fa-exclamation-circle" style="font-size: 70px;opacity: 0.5;"></i>
						</div>
					`);
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		})

		const resetElem = function() {
			$('.edit-child-card').find('.card-footer:first').remove();
			$('.edit-child-info').show();
			$('.x-field').remove();
			$('.disable-overlay').remove();
			$('.parent-info-card .overlay, .immunize-card .overlay').remove();
		}

		$(document).on('click', '.btn-cancel-edit', function() {
			if (!confirm('Are you sure to cancel update?')) return false; 
			resetElem();
		})

		$(document).on('click', '.btn-save-update', function(e) {
			if (!confirm('Are you sure to save the changes?')) return false; 
			$.loading.show({title:'Updating data...'});
			var column = {};
			$('.edit-child-card').find('input, select').each(function(i, elem) {
				column[elem.name] = elem.value;
			})

			$('.x-field').removeClass('is-invalid');
			$('.error').text('');

			column['rtype'] = 'save-child-update';

			// console.log(column);

			$.ajax({
				method: 'PUT',
				url: "{{ route('children.update', ['child'=>$data->id]) }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: column,
				success: function(resp) {
					// console.log(resp);
					if (resp.statusCode == 419) {
						for (var e in resp.errors) {
							$(`[name="${e}"]`).addClass('is-invalid');
							$(`[name="${e}"]`).closest('.form-group').find('.error:first').text(resp.errors[e][0]);
						}

						toastr.error(resp.message);
					}
					else {
						for (var d in resp.data) {
							$(`.${d}`).text(resp.data[d]);
						}
						resetElem();
						toastr.success(resp.message);
					}
					$.loading.hide();
				},
				error: function(err) {
					$.loading.hide();
					console.log(err);
				}
			})
		});

	})
</script>
@endsection