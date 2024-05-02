
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Print Reports</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->

	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/css/select2.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('/adminlte/dist/css/adminlte.min.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body>
	@if ($type=='child' OR $type=='mother')
	<div class="row">
		<div class="col-sm-12">
			<style type="text/css">
				.report-header span {
				  display: block;
				  text-align: center;
				}
			</style>
			<div class="report-header mb-3">
				<span style="font-size: 25px;font-weight: bold;">Final Reports</span>
				@if ($type=='child')
				<span style="font-size: 18px;font-weight: 560;">Children List</span>
				@elseif ($type=='mother')
				<span style="font-size: 18px;font-weight: 560;">Mother List</span>
				@endif
				<span style="font-size: 14px;">Date: {{ date('m/d/Y') }}</span>
			</div>
			@if ($type=='child')
			<table class="table table-bordered">
				<thead>
					<th>Child Name</th>
					<th>Birthdate</th>
					<th>Gender</th>
					<th>Born Weight</th>
					<th>Mother</th>
					<th>Immunize Status</th>
				</thead>
				<tbody>
					@foreach($data as $d)
					<tr>
						<td>
							{{ $d->firstname }} 
							{{ $d->middlename }} 
							{{ $d->lastname }} 
						</td>
						<td>{{ date('M d, Y', strtotime($d->birthdate)) }}</td>
						<td>{{ $d->gender }}</td>
						<td>{{ $d->born_weight }} grams</td>
						<td>
							{{ $d->parent->mother->firstname }} 
							{{ $d->parent->mother->laststname }}
						</td>
						<td>{{ $d->is_record_done?'Complete':'Under Monitor' }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@elseif ($type=='mother')
			<table class="table table-bordered">
				<thead>
					<th>Mother Name</th>
					<th>Birthdate</th>
					<th>Address</th>
					<th>Contact</th>
					<th>Total Pregnant</th>
				</thead>
				<tbody>
					@foreach($data as $d)
					<tr>
						<td>
							{{ $d->firstname }} 
							{{ $d->middlename }} 
							{{ $d->lastname }} 
						</td>
						<td>{{ date('M d, Y', strtotime($d->birthdate)) }}</td>
						<td>{{ $d->address }}</td>
						<td>{{ $d->contact }}</td>
						<td>
							{{ $d->pregnants()->count() }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			<p>Printed by: {{ Auth::user()->fullname }}</p>
		</div>
	</div>
	@else
	<div class="row">
		<style type="text/css">
			.report-header span {
			  display: block;
			  text-align: center;
			}
		</style>
		@foreach($data as $k => $d)
		<div class="col-sm-12" style="page-break-before: always; page-break-after: always; display: block;">
			<div class="report-header mb-3">
				<span style="font-size: 25px;font-weight: bold;">Final Reports</span>
				@if ($type=='immunize')
				<span style="font-size: 18px;font-weight: 560;">
					Immunization ({{$d->is_record_done?'Graduate':'Under Monitoring'}}) - 
					{{ $d->firstname }} {{ $d->lastname }}
				</span>
				@elseif ($type=='prenatal')
				<span style="font-size: 18px;font-weight: 560;">
					Prenatals Records -  {{ $d->firstname }} {{ $d->lastname }}
				</span>
				@endif
				<span style="font-size: 14px;">Date: {{ date('m/d/Y') }}</span>
			</div>

			@if ($type=='immunize')
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
						$bcg = filterJsonData($d->immunizations, 'bcg');
						$hepab = filterJsonData($d->immunizations, 'hepab');
						$pv = filterJsonData($d->immunizations, 'pv');
						$opv = filterJsonData($d->immunizations, 'opv');
						$ipv = filterJsonData($d->immunizations, 'ipv');
						$pcv = filterJsonData($d->immunizations, 'pcv');
						$mmr = filterJsonData($d->immunizations, 'mmr');
						$other = filterJsonData($d->immunizations, 'other');
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

			@elseif($type=='prenatal')
				@foreach($d->pregnants as $p)
				@php
				  $t1_c1 = $p->prenatals()->where([['trimester', '1st'],['checkup_order', '1']])->first();
				  $t1_c2 = $p->prenatals()->where([['trimester', '1st'],['checkup_order', '2']])->first();
				  $t1_c3 = $p->prenatals()->where([['trimester', '1st'],['checkup_order', '3']])->first();

				  $t2_c1 = $p->prenatals()->where([['trimester', '2nd'],['checkup_order', '1']])->first();
				  $t2_c2 = $p->prenatals()->where([['trimester', '2nd'],['checkup_order', '2']])->first();
				  $t2_c3 = $p->prenatals()->where([['trimester', '2nd'],['checkup_order', '3']])->first();

				  $t3_c1 = $p->prenatals()->where([['trimester', '3rd'],['checkup_order', '1']])->first();
				  $t3_c2 = $p->prenatals()->where([['trimester', '3rd'],['checkup_order', '2']])->first();
				  $t3_c3 = $p->prenatals()->where([['trimester', '3rd'],['checkup_order', '3']])->first();

				  if ($t1_c1) { $t1_c1->data = $t1_c1?json_decode($t1_c1->data, true):[]; }
				  if ($t1_c2) { $t1_c2->data = $t1_c2?json_decode($t1_c2->data, true):[]; }
				  if ($t1_c3) { $t1_c3->data = $t1_c3?json_decode($t1_c3->data, true):[]; }
				  if ($t2_c1) { $t2_c1->data = $t2_c1?json_decode($t2_c1->data, true):[]; }
				  if ($t2_c2) { $t2_c2->data = $t2_c2?json_decode($t2_c2->data, true):[]; }
				  if ($t2_c3) { $t2_c3->data = $t2_c3?json_decode($t2_c3->data, true):[]; }
				  if ($t3_c1) { $t3_c1->data = $t3_c1?json_decode($t3_c1->data, true):[]; }
				  if ($t3_c2) { $t3_c2->data = $t3_c2?json_decode($t3_c2->data, true):[]; }
				  if ($t3_c3) { $t3_c3->data = $t3_c3?json_decode($t3_c3->data, true):[]; }
				@endphp

				<style type="text/css">
		      ul.list-unstyled li {
		        padding-left: 20px;
		      }
		      table.table {
		        background-color: white;
		      }
		      table.table.p-info {
		        table-layout: fixed;
		      }
		      table.table.p-info th, table.table.p-info td {
		        vertical-align: middle;
		      }
		    </style>

		    <span style="
		    	font-size: 18px;
		    	font-weight: 560; text-align: center;
			    width: 100%;
			    margin: 20px 10px 10px 10px;
			    display: block;
			    border-top: 2px dotted grey;
			    padding-top: 20px;"
			   >
					Prenatal Record Status -  {{ $p->is_record_done?'Complete':'Under Monitoring' }}
				</span>

		    <div class="col-sm-12 table-responsive">
	        <table class="table table-bordered">
	          <thead>
	            <tr><th colspan="3">First Trimester</th></tr>
	            <tr>
	              <th>1st Check-up</th>
	              <th>2nd Check-up</th>
	              <th>3rd Check-up</th>
	            </tr>
	          </thead>
	          <tbody>
	            <tr>
	              <td>
	                Date: <b>{{ !$t1_c1?'':date('M d, Y', strtotime($t1_c1->date_conduct)) }}</b>
	              </td>
	              <td>
	                Date: <b>{{ !$t1_c2?'':date('M d, Y', strtotime($t1_c2->date_conduct)) }}</b>
	              </td>
	              <td>
	                Date: <b>{{ !$t1_c3?'':date('M d, Y', strtotime($t1_c3->date_conduct)) }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Weight: <b>{{ !$t1_c1?'':$t1_c1->data['weight'] }}</b>
	              </td>
	              <td>
	                Weight: <b>{{ !$t1_c2?'':$t1_c2->data['weight'] }}</b>
	              </td>
	              <td>
	                Weight: <b>{{ !$t1_c3?'':$t1_c3->data['weight'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Height: <b>{{ !$t1_c1?'':$t1_c1->data['height'] }}</b>
	              </td>
	              <td>
	                Height: <b>{{ !$t1_c2?'':$t1_c2->data['height'] }}</b>
	              </td>
	              <td>
	                Height: <b>{{ !$t1_c3?'':$t1_c3->data['height'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Age of Gestation: <b>{{ !$t1_c1?'':$t1_c1->data['age_of_gestation'] }}</b>
	              </td>
	              <td>
	                Age of Gestation: <b>{{ !$t1_c2?'':$t1_c2->data['age_of_gestation'] }}</b>
	              </td>
	              <td>
	                Age of Gestation: <b>{{ !$t1_c3?'':$t1_c3->data['age_of_gestation'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Blood Pressure: <b>{{ !$t1_c1?'':$t1_c1->data['blood_pressure'] }}</b>
	              </td>
	              <td>
	                Blood Pressure: <b>{{ !$t1_c2?'':$t1_c2->data['blood_pressure'] }}</b>
	              </td>
	              <td>
	                Blood Pressure: <b>{{ !$t1_c3?'':$t1_c3->data['blood_pressure'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t1_c1?'fa-square':($t1_c1->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c1?'fa-square':($t1_c1->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c1?'fa-square':($t1_c1->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> Overweight
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t1_c2?'':($t1_c2->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c2?'':($t1_c2->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c2?'':($t1_c2->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> Overweight
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t1_c3?'':($t1_c3->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c3?'':($t1_c3->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c3?'':($t1_c3->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> Overweight
	                  </li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Make a Birth Plan: {!! !$t1_c1?'':$t1_c1->data['make_a_birth_plan'] !!}
	              </td>
	              <td>
	                Make a Birth Plan: {!! !$t1_c2?'':$t1_c2->data['make_a_birth_plan'] !!}
	              </td>
	              <td>
	                Make a Birth Plan: {!! !$t1_c3?'':$t1_c3->data['make_a_birth_plan'] !!}
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Dental Checkup: {!! !$t1_c1?'':$t1_c1->data['dental_checkup'] !!}
	              </td>
	              <td>
	                Dental Checkup: {!! !$t1_c2?'':$t1_c2->data['dental_checkup'] !!}
	              </td>
	              <td>
	                Dental Checkup: {!! !$t1_c3?'':$t1_c3->data['dental_checkup'] !!}
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Laboratory Test Done: {!! !$t1_c1?'':$t1_c1->data['laboratory_test_done'] !!}
	              </td>
	              <td>
	                Laboratory Test Done: {!! !$t1_c2?'':$t1_c2->data['laboratory_test_done'] !!}
	              </td>
	              <td>
	                Laboratory Test Done: {!! !$t1_c3?'':$t1_c3->data['laboratory_test_done'] !!}
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Hemoglobin Count: <b>{{ !$t1_c1?'':$t1_c1->data['hemoglobin_count'] }}</b>
	              </td>
	              <td>
	                Hemoglobin Count: <b>{{ !$t1_c2?'':$t1_c2->data['hemoglobin_count'] }}</b>
	              </td>
	              <td>
	                Hemoglobin Count: <b>{{ !$t1_c3?'':$t1_c3->data['hemoglobin_count'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Urinalysis: <b>{{ !$t1_c1?'':$t1_c1->data['urinalysis'] }}</b>
	              </td>
	              <td>
	                Urinalysis: <b>{{ !$t1_c2?'':$t1_c2->data['urinalysis'] }}</b>
	              </td>
	              <td>
	                Urinalysis: <b>{{ !$t1_c3?'':$t1_c3->data['urinalysis'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Complete Blood Count (CBC): <b>{{ !$t1_c1?'':$t1_c1->data['complete_blood_count'] }}</b>
	              </td>
	              <td>
	                Complete Blood Count (CBC): <b>{{ !$t1_c2?'':$t1_c2->data['complete_blood_count'] }}</b>
	              </td>
	              <td>
	                Complete Blood Count (CBC): <b>{{ !$t1_c3?'':$t1_c3->data['complete_blood_count'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                STIs gamit ang syndromic approach:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t1_c1?'':$t1_c1->data['stis_sundromic_aaproach']['syphilis']=='true'?'<i class="far fa-check-square"></i>':'-' !!} Syphilis</li>
	                  <li>
	                    {!! !$t1_c1?'':$t1_c1->data['stis_sundromic_aaproach']['hiv']=='true'?'<i class="far fa-check-square"></i>':'-' !!} HIV</li>
	                  <li>
	                    {!! !$t1_c1?'':$t1_c1->data['stis_sundromic_aaproach']['hepatits_b']=='true'?'<i class="far fa-check-square"></i>':'-' !!} Hepatits B (HbsAg)</li>
	                </ul>
	              </td>
	              <td>
	                STIs gamit ang syndromic approach:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t1_c2?'':$t1_c2->data['stis_sundromic_aaproach']['syphilis']=='true'?'<i class="far fa-check-square"></i>':'-' !!} Syphilis</li>
	                  <li>
	                    {!! !$t1_c2?'':$t1_c2->data['stis_sundromic_aaproach']['hiv']=='true'?'<i class="far fa-check-square"></i>':'-' !!} HIV</li>
	                  <li>
	                    {!! !$t1_c2?'':$t1_c2->data['stis_sundromic_aaproach']['hepatits_b']=='true'?'<i class="far fa-check-square"></i>':'-' !!} Hepatits B (HbsAg)</li>
	                </ul>
	              </td>
	              <td>
	                STIs gamit ang syndromic approach:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t1_c3?'':$t1_c3->data['stis_sundromic_aaproach']['syphilis']=='true'?'<i class="far fa-check-square"></i>':'-' !!} Syphilis</li>
	                  <li>
	                    {!! !$t1_c3?'':$t1_c3->data['stis_sundromic_aaproach']['hiv']=='true'?'<i class="far fa-check-square"></i>':'-' !!} HIV</li>
	                  <li>
	                    {!! !$t1_c3?'':$t1_c3->data['stis_sundromic_aaproach']['hepatits_b']=='true'?'<i class="far fa-check-square"></i>':'-' !!} Hepatits B (HbsAg)</li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Stool Examination: <b>{{ !$t1_c1?'':$t1_c1->data['stool_examination'] }}</b>
	              </td>
	              <td>
	                Stool Examination: <b>{{ !$t1_c2?'':$t1_c2->data['stool_examination'] }}</b>
	              </td>
	              <td>
	                Stool Examination: <b>{{ !$t1_c3?'':$t1_c3->data['stool_examination'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Acetic Acid Wash: <b>{{ !$t1_c1?'':$t1_c1->data['acetic_acid_wash'] }}</b>
	              </td>
	              <td>
	                Acetic Acid Wash: <b>{{ !$t1_c2?'':$t1_c2->data['acetic_acid_wash'] }}</b>
	              </td>
	              <td>
	                Acetic Acid Wash: <b>{{ !$t1_c3?'':$t1_c3->data['acetic_acid_wash'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Tetanus-containing Vaccine: <b>{{ !$t1_c1?'':$t1_c1->data['tetanus_containing_vaccine'] }}</b>

	                <p>Date given: <b>{{ !$t1_c1?'':$t1_c1->data['date_given'] }}</b></p>
	              </td>
	              <td>
	                Tetanus-containing Vaccine: <b>{{ !$t1_c2?'':$t1_c2->data['tetanus_containing_vaccine'] }}</b>

	                <p>Date given: <b>{{ !$t1_c2?'':$t1_c2->data['date_given'] }}</b></p>
	              </td>
	              <td>
	                Tetanus-containing Vaccine: <b>{{ !$t1_c3?'':$t1_c3->data['tetanus_containing_vaccine'] }}</b>

	                <p>Date given: <b>{{ !$t1_c3?'':$t1_c3->data['date_given'] }}</b></p>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t1_c1?'fa-square':($t1_c1->data['treatments']=='Syphilis' ? 'fa-check-square' : 'fa-square') }}"></i> Syphilis
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c1?'fa-square':($t1_c1->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c1?'fa-square':($t1_c1->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c1?'fa-square':($t1_c1->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t1_c2?'fa-square':($t1_c2->data['treatments']=='Syphilis' ? 'fa-check-square' : 'fa-square') }}"></i> Syphilis
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c2?'fa-square':($t1_c2->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c2?'fa-square':($t1_c2->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c2?'fa-square':($t1_c2->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t1_c3?'fa-square':($t1_c3->data['treatments']=='Syphilis' ? 'fa-check-square' : 'fa-square') }}"></i> Syphilis
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c3?'fa-square':($t1_c3->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c3?'fa-square':($t1_c3->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t1_c3?'fa-square':($t1_c3->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Discussion/Services given:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t1_c1?'-':($t1_c1->data['discussion_services_given']['avoid_alcohol']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    To Avoid alcohol, tobacco, or illegal drugs
	                  </li>
	                  <li>
	                    {!! !$t1_c1?'-':($t1_c1->data['discussion_services_given']['advises_foods']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Advises about the right foods
	                  </li>
	                  <li>
	                    {!! !$t1_c1?'-':($t1_c1->data['discussion_services_given']['advises_sex_safe']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Advises about sex safe
	                  </li>
	                  <li>
	                    {!! !$t1_c1?'-':($t1_c1->data['discussion_services_given']['right_use_of_insecticide']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    The right use of insecticide-treated/mosquito net
	                  </li>
	                  <li>
	                    {!! !$t1_c1?'-':($t1_c1->data['discussion_services_given']['birth_plan']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Birth Plan
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Discussion/Services given:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t1_c2?'-':($t1_c2->data['discussion_services_given']['avoid_alcohol']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    To Avoid alcohol, tobacco, or illegal drugs
	                  </li>
	                  <li>
	                    {!! !$t1_c2?'-':($t1_c2->data['discussion_services_given']['advises_foods']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Advises about the right foods
	                  </li>
	                  <li>
	                    {!! !$t1_c2?'-':($t1_c2->data['discussion_services_given']['advises_sex_safe']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Advises about sex safe
	                  </li>
	                  <li>
	                    {!! !$t1_c2?'-':($t1_c2->data['discussion_services_given']['right_use_of_insecticide']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    The right use of insecticide-treated/mosquito net
	                  </li>
	                  <li>
	                    {!! !$t1_c2?'-':($t1_c2->data['discussion_services_given']['birth_plan']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Birth Plan
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Discussion/Services given:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t1_c3?'-':($t1_c3->data['discussion_services_given']['avoid_alcohol']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    To Avoid alcohol, tobacco, or illegal drugs
	                  </li>
	                  <li>
	                    {!! !$t1_c3?'-':($t1_c3->data['discussion_services_given']['advises_foods']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Advises about the right foods
	                  </li>
	                  <li>
	                    {!! !$t1_c3?'-':($t1_c3->data['discussion_services_given']['advises_sex_safe']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Advises about sex safe
	                  </li>
	                  <li>
	                    {!! !$t1_c3?'-':($t1_c3->data['discussion_services_given']['right_use_of_insecticide']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    The right use of insecticide-treated/mosquito net
	                  </li>
	                  <li>
	                    {!! !$t1_c3?'-':($t1_c3->data['discussion_services_given']['birth_plan']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
	                    Birth Plan
	                  </li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Return Date: 
	                <b>{{ empty(!$t1_c1?'':$t1_c1->data['return_date'])?'':date('M d, Y', strtotime($t1_c1->data['return_date'])) }}</b>
	              </td>
	              <td>
	                Return Date: 
	                <b>{{ empty(!$t1_c2?'':$t1_c2->data['return_date'])?'':date('M d, Y', strtotime($t1_c2->data['return_date'])) }}</b>
	              </td>
	              <td>
	                Return Date: 
	                <b>{{ empty(!$t1_c3?'':$t1_c3->data['return_date'])?'':date('M d, Y', strtotime($t1_c3->data['return_date'])) }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Health Service Provider: <b>{{ !$t1_c1?'':$t1_c1->data['health_service_provider'] }}</b>
	              </td>
	              <td>
	                Health Service Provider: <b>{{ !$t1_c2?'':$t1_c2->data['health_service_provider'] }}</b>
	              </td>
	              <td>
	                Health Service Provider: <b>{{ !$t1_c3?'':$t1_c3->data['health_service_provider'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Hospital Referral: <b>{{ !$t1_c1?'':$t1_c1->data['hospital_referral'] }}</b>
	              </td>
	              <td>
	                Hospital Referral: <b>{{ !$t1_c2?'':$t1_c2->data['hospital_referral'] }}</b>
	              </td>
	              <td>
	                Hospital Referral: <b>{{ !$t1_c3?'':$t1_c3->data['hospital_referral'] }}</b>
	              </td>
	            </tr>
	          </tbody>
	        </table>
	      </div>


	      <div class="col-sm-12 table-responsive">
	        <table class="table table-bordered">
	          <thead>
	            <tr><th colspan="3">Second Trimester</th></tr>
	            <tr>
	              <th>1st Check-up</th>
	              <th>2nd Check-up</th>
	              <th>3rd Check-up</th>
	            </tr>
	          </thead>
	          <tbody>
	            <tr>
	              <td>
	                Date: <b>{{ !$t2_c1?'':date('M d, Y', strtotime($t2_c1->date_conduct)) }}</b>
	              </td>
	              <td>
	                Date: <b>{{ !$t2_c2?'':date('M d, Y', strtotime($t2_c2->date_conduct)) }}</b>
	              </td>
	              <td>
	                Date: <b>{{ !$t2_c3?'':date('M d, Y', strtotime($t2_c3->date_conduct)) }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Weight: <b>{{ !$t2_c1?'':$t2_c1->data['weight'] }}</b>
	              </td>
	              <td>
	                Weight: <b>{{ !$t2_c2?'':$t2_c2->data['weight'] }}</b>
	              </td>
	              <td>
	                Weight: <b>{{ !$t2_c3?'':$t2_c3->data['weight'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Height: <b>{{ !$t2_c1?'':$t2_c1->data['height'] }}</b>
	              </td>
	              <td>
	                Height: <b>{{ !$t2_c2?'':$t2_c2->data['height'] }}</b>
	              </td>
	              <td>
	                Height: <b>{{ !$t2_c3?'':$t2_c3->data['height'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Age of Gestation: <b>{{ !$t2_c1?'':$t2_c1->data['age_of_gestation'] }}</b>
	              </td>
	              <td>
	                Age of Gestation: <b>{{ !$t2_c2?'':$t2_c2->data['age_of_gestation'] }}</b>
	              </td>
	              <td>
	                Age of Gestation: <b>{{ !$t2_c3?'':$t2_c3->data['age_of_gestation'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Blood Pressure: <b>{{ !$t2_c1?'':$t2_c1->data['blood_pressure'] }}</b>
	              </td>
	              <td>
	                Blood Pressure: <b>{{ !$t2_c2?'':$t2_c2->data['blood_pressure'] }}</b>
	              </td>
	              <td>
	                Blood Pressure: <b>{{ !$t2_c3?'':$t2_c3->data['blood_pressure'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t2_c1?'fa-square':($t2_c1->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c1?'fa-square':($t2_c1->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c1?'fa-square':($t2_c1->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Overweight
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t2_c2?'fa-square':($t2_c2->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c2?'fa-square':($t2_c2->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c2?'fa-square':($t2_c2->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Overweight
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t2_c3?'fa-square':($t2_c3->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c3?'fa-square':($t2_c3->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c3?'fa-square':($t2_c3->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Overweight
	                  </li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Pagsusuri ng kalagayan ng buntis: {!! !$t2_c1?'':$t2_c1->data['pregnant_situation'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng kalagayan ng buntis: {!! !$t2_c2?'':$t2_c2->data['pregnant_situation'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng kalagayan ng buntis: {!! !$t2_c3?'':$t2_c3->data['pregnant_situation'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Mga payong binigay: <b>{!! !$t2_c1?'':$t2_c1->data['advice_given'] !!}</b>
	              </td>
	              <td>
	                Mga payong binigay: <b>{!! !$t2_c2?'':$t2_c2->data['advice_given'] !!}</b>
	              </td>
	              <td>
	                Mga payong binigay: <b>{!! !$t2_c3?'':$t2_c3->data['advice_given'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Mga pagbabago sa birthplan: <b>{!! !$t2_c1?'':$t2_c1->data['changes_birthplan'] !!}</b>
	              </td>
	              <td>
	                Mga pagbabago sa birthplan: <b>{!! !$t2_c2?'':$t2_c2->data['changes_birthplan'] !!}</b>
	              </td>
	              <td>
	                Mga pagbabago sa birthplan: <b>{!! !$t2_c3?'':$t2_c3->data['changes_birthplan'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Pagsusuri ng ngipin: <b>{!! !$t2_c1?'':$t2_c1->data['dental_checkup'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng ngipin: <b>{!! !$t2_c2?'':$t2_c2->data['dental_checkup'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng ngipin: <b>{!! !$t2_c3?'':$t2_c3->data['dental_checkup'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Laboratory Tests Done: {!! !$t2_c1?'':$t2_c1->data['laboratory_test_done'] !!}
	              </td>
	              <td>
	                Laboratory Tests Done: {!! !$t2_c2?'':$t2_c2->data['laboratory_test_done'] !!}
	              </td>
	              <td>
	                Laboratory Tests Done: {!! !$t2_c3?'':$t2_c3->data['laboratory_test_done'] !!}
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Urinalysis: 
	                <b>{{ !$t2_c1?'':$t2_c1->data['urinalysis'] }}</b>
	              </td>
	              <td>
	                Urinalysis: 
	                <b>{{ !$t2_c2?'':$t2_c2->data['urinalysis'] }}</b>
	              </td>
	              <td>
	                Urinalysis: 
	                <b>{{ !$t2_c3?'':$t2_c3->data['urinalysis'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Complete Blood Count (CBC): 
	                <b>{{ !$t2_c1?'':$t2_c1->data['complete_blood_count'] }}</b>
	              </td>
	              <td>
	                Complete Blood Count (CBC): 
	                <b>{{ !$t2_c2?'':$t2_c2->data['complete_blood_count'] }}</b>
	              </td>
	              <td>
	                Complete Blood Count (CBC): 
	                <b>{{ !$t2_c3?'':$t2_c3->data['complete_blood_count'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Etiologic tests para sa STIs, kung kinakailangan: 
	                <b>{{ !$t2_c1?'':$t2_c1->data['etiologic_test_if_needed'] }}</b>
	              </td>
	              <td>
	                Etiologic tests para sa STIs, kung kinakailangan: 
	                <b>{{ !$t2_c2?'':$t2_c2->data['etiologic_test_if_needed'] }}</b>
	              </td>
	              <td>
	                Etiologic tests para sa STIs, kung kinakailangan: 
	                <b>{{ !$t2_c3?'':$t2_c3->data['etiologic_test_if_needed'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Pap Smear, kung kinakailangan: 
	                <b>{{ !$t2_c1?'':$t2_c1->data['pap_smear_if_needed'] }}</b>
	              </td>
	              <td>
	                Pap Smear, kung kinakailangan: 
	                <b>{{ !$t2_c2?'':$t2_c2->data['pap_smear_if_needed'] }}</b>
	              </td>
	              <td>
	                Pap Smear, kung kinakailangan: 
	                <b>{{ !$t2_c3?'':$t2_c3->data['pap_smear_if_needed'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Gestational diabetes (oral glucose challenge test), kung kinakailangan: 
	                <b>{{ !$t2_c1?'':$t2_c1->data['gestational_diabetes_if_needed'] }}</b>
	              </td>
	              <td>
	                Gestational diabetes (oral glucose challenge test), kung kinakailangan: 
	                <b>{{ !$t2_c2?'':$t2_c2->data['gestational_diabetes_if_needed'] }}</b>
	              </td>
	              <td>
	                Gestational diabetes (oral glucose challenge test), kung kinakailangan: 
	                <b>{{ !$t2_c3?'':$t2_c3->data['gestational_diabetes_if_needed'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Bacteriurial, kung kinakailangan: 
	                <b>{{ !$t2_c1?'':$t2_c1->data['bacteriuria_if_needed'] }}</b>
	              </td>
	              <td>
	                Bacteriurial, kung kinakailangan: 
	                <b>{{ !$t2_c2?'':$t2_c2->data['bacteriuria_if_needed'] }}</b>
	              </td>
	              <td>
	                Bacteriurial, kung kinakailangan: 
	                <b>{{ !$t2_c3?'':$t2_c3->data['bacteriuria_if_needed'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t2_c1?'fa-square':($t2_c1->data['treatments']=='Deworming' ? 'fa-check-square' : 'fa-square') }}"></i> Deworming
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c1?'fa-square':($t2_c1->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c1?'fa-square':($t2_c1->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c1?'fa-square':($t2_c1->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t2_c2?'fa-square':($t2_c2->data['treatments']=='Deworming' ? 'fa-check-square' : 'fa-square') }}"></i> Deworming
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c2?'fa-square':($t2_c2->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c2?'fa-square':($t2_c2->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c2?'fa-square':($t2_c2->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t2_c3?'fa-square':($t2_c3->data['treatments']=='Deworming' ? 'fa-check-square' : 'fa-square') }}"></i> Deworming
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c3?'fa-square':($t2_c3->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c3?'fa-square':($t2_c3->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t2_c3?'fa-square':($t2_c3->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Pinag-usapan/Serbisyong ibinigay:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t2_c1?'-':($t2_c1->data['discussion_services_given']['reminder_previous_discussion']=='true'?'<i class="far fa-check-square"></i>':'-') !!}
	                    Pagpaalala ng nakaraang tinalakay
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Pinag-usapan/Serbisyong ibinigay:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t2_c2?'-':($t2_c2->data['discussion_services_given']['reminder_previous_discussion']=='true'?'<i class="far fa-check-square"></i>':'-') !!}
	                    Pagpaalala ng nakaraang tinalakay
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Pinag-usapan/Serbisyong ibinigay:
	                <ul class="list-unstyled">
	                  <li>
	                    {!! !$t2_c3?'-':($t2_c3->data['discussion_services_given']['reminder_previous_discussion']=='true'?'<i class="far fa-check-square"></i>':'-') !!}
	                    Pagpaalala ng nakaraang tinalakay
	                  </li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Return Date:
	                <b>{{ empty(!$t2_c1?'':$t2_c1->data['return_date'])?'':date('M d, Y', strtotime($t2_c1->data['return_date'])) }}</b>
	              </td>
	              <td>
	                Return Date:
	                <b>{{ empty(!$t2_c2?'':$t2_c2->data['return_date'])?'':date('M d, Y', strtotime($t2_c2->data['return_date'])) }}</b>
	              </td>
	              <td>
	                Return Date:
	                <b>{{ empty(!$t2_c3?'':$t2_c3->data['return_date'])?'':date('M d, Y', strtotime($t2_c3->data['return_date'])) }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Health Service Provider:
	                <b>{{ !$t2_c1?'':$t2_c1->data['health_service_provider'] }}</b>
	              </td>
	              <td>
	                Health Service Provider:
	                <b>{{ !$t2_c2?'':$t2_c2->data['health_service_provider'] }}</b>
	              </td>
	              <td>
	                Health Service Provider:
	                <b>{{ !$t2_c3?'':$t2_c3->data['health_service_provider'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Hospital Referral:
	                <b>{{ !$t2_c1?'':$t2_c1->data['hospital_referral'] }}</b>
	              </td>
	              <td>
	                Hospital Referral:
	                <b>{{ !$t2_c2?'':$t2_c2->data['hospital_referral'] }}</b>
	              </td>
	              <td>
	                Hospital Referral:
	                <b>{{ !$t2_c3?'':$t2_c3->data['hospital_referral'] }}</b>
	              </td>
	            </tr>
	          </tbody>
	        </table>
	      </div>


	      <div class="col-sm-12 table-responsive">
	        <table class="table table-bordered">
	          <thead>
	            <tr><th colspan="3">Third Trimester</th></tr>
	            <tr>
	              <th>1st Check-up</th>
	              <th>2nd Check-up</th>
	              <th>3rd Check-up</th>
	            </tr>
	          </thead>
	          <tbody>
	            <tr>
	              <td>
	                Date: <b>{{ !$t3_c1?'':date('M d, Y', strtotime($t3_c1->date_conduct)) }}</b>
	              </td>
	              <td>
	                Date: <b>{{ !$t3_c2?'':date('M d, Y', strtotime($t3_c2->date_conduct)) }}</b>
	              </td>
	              <td>
	                Date: <b>{{ !$t3_c3?'':date('M d, Y', strtotime($t3_c3->date_conduct)) }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Weight: <b>{{ !$t3_c1?'':$t3_c1->data['weight'] }}</b>
	              </td>
	              <td>
	                Weight: <b>{{ !$t3_c2?'':$t3_c2->data['weight'] }}</b>
	              </td>
	              <td>
	                Weight: <b>{{ !$t3_c3?'':$t3_c3->data['weight'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Height: <b>{{ !$t3_c1?'':$t3_c1->data['height'] }}</b>
	              </td>
	              <td>
	                Height: <b>{{ !$t3_c2?'':$t3_c2->data['height'] }}</b>
	              </td>
	              <td>
	                Height: <b>{{ !$t3_c3?'':$t3_c3->data['height'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Age of Gestation: <b>{{ !$t3_c1?'':$t3_c1->data['age_of_gestation'] }}</b>
	              </td>
	              <td>
	                Age of Gestation: <b>{{ !$t3_c2?'':$t3_c2->data['age_of_gestation'] }}</b>
	              </td>
	              <td>
	                Age of Gestation: <b>{{ !$t3_c3?'':$t3_c3->data['age_of_gestation'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Blood Pressure: <b>{{ !$t3_c1?'':$t3_c1->data['blood_pressure'] }}</b>
	              </td>
	              <td>
	                Blood Pressure: <b>{{ !$t3_c2?'':$t3_c2->data['blood_pressure'] }}</b>
	              </td>
	              <td>
	                Blood Pressure: <b>{{ !$t3_c3?'':$t3_c3->data['blood_pressure'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t3_c1?'fa-square':($t3_c1->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c1?'fa-square':($t3_c1->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c1?'fa-square':($t3_c1->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Overweight
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t3_c2?'fa-square':($t3_c2->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c2?'fa-square':($t3_c2->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c2?'fa-square':($t3_c2->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Overweight
	                  </li>
	                </ul>
	              </td>
	              <td>
	                Nutritional Status:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t3_c3?'fa-square':($t3_c3->data['nutritional_status']=='Normal' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Normal
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c3?'fa-square':($t3_c3->data['nutritional_status']=='Under Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Underweight
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c3?'fa-square':($t3_c3->data['nutritional_status']=='Over Weight' ? 'fa-check-square' : 'fa-square') }}"></i> 
	                    Overweight
	                  </li>
	                </ul>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Pagsusuri ng kalagayan ng buntis: {!! !$t3_c1?'':$t3_c1->data['pregnant_situation'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng kalagayan ng buntis: {!! !$t3_c2?'':$t3_c2->data['pregnant_situation'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng kalagayan ng buntis: {!! !$t3_c3?'':$t3_c3->data['pregnant_situation'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Mga payong binigay: <b>{!! !$t3_c1?'':$t3_c1->data['advice_given'] !!}</b>
	              </td>
	              <td>
	                Mga payong binigay: <b>{!! !$t3_c2?'':$t3_c2->data['advice_given'] !!}</b>
	              </td>
	              <td>
	                Mga payong binigay: <b>{!! !$t3_c3?'':$t3_c3->data['advice_given'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Mga pagbabago sa birthplan: <b>{!! !$t3_c1?'':$t3_c1->data['changes_birthplan'] !!}</b>
	              </td>
	              <td>
	                Mga pagbabago sa birthplan: <b>{!! !$t3_c2?'':$t3_c2->data['changes_birthplan'] !!}</b>
	              </td>
	              <td>
	                Mga pagbabago sa birthplan: <b>{!! !$t3_c3?'':$t3_c3->data['changes_birthplan'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Pagsusuri ng ngipin: <b>{!! !$t3_c1?'':$t3_c1->data['dental_checkup'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng ngipin: <b>{!! !$t3_c2?'':$t3_c2->data['dental_checkup'] !!}</b>
	              </td>
	              <td>
	                Pagsusuri ng ngipin: <b>{!! !$t3_c3?'':$t3_c3->data['dental_checkup'] !!}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Laboratory Tests Done: {!! !$t3_c1?'':$t3_c1->data['laboratory_test_done'] !!}
	              </td>
	              <td>
	                Laboratory Tests Done: {!! !$t3_c2?'':$t3_c2->data['laboratory_test_done'] !!}
	              </td>
	              <td>
	                Laboratory Tests Done: {!! !$t3_c3?'':$t3_c3->data['laboratory_test_done'] !!}
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Urinalysis: 
	                <b>{{ !$t3_c1?'':$t3_c1->data['urinalysis'] }}</b>
	              </td>
	              <td>
	                Urinalysis: 
	                <b>{{ !$t3_c2?'':$t3_c2->data['urinalysis'] }}</b>
	              </td>
	              <td>
	                Urinalysis: 
	                <b>{{ !$t3_c3?'':$t3_c3->data['urinalysis'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Complete Blood Count (CBC): 
	                <b>{{ !$t3_c1?'':$t3_c1->data['complete_blood_count'] }}</b>
	              </td>
	              <td>
	                Complete Blood Count (CBC): 
	                <b>{{ !$t3_c2?'':$t3_c2->data['complete_blood_count'] }}</b>
	              </td>
	              <td>
	                Complete Blood Count (CBC): 
	                <b>{{ !$t3_c3?'':$t3_c3->data['complete_blood_count'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Bacteriuria, kung kinakailangan: <b>{{ !$t3_c1?'':$t3_c1->data['bacteriuria_if_needed'] }}</b>
	              </td>
	              <td>
	                Bacteriuria, kung kinakailangan: <b>{{ !$t3_c2?'':$t3_c2->data['bacteriuria_if_needed'] }}</b>
	              </td>
	              <td>
	                Bacteriuria, kung kinakailangan: <b>{{ !$t3_c3?'':$t3_c3->data['bacteriuria_if_needed'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Blood/RH group, kung kinakailangan: <b>{{ !$t3_c1?'':$t3_c1->data['blood_rh_if_needed'] }}</b>
	              </td>
	              <td>
	                Blood/RH group, kung kinakailangan: <b>{{ !$t3_c2?'':$t3_c2->data['blood_rh_if_needed'] }}</b>
	              </td>
	              <td>
	                Blood/RH group, kung kinakailangan: <b>{{ !$t3_c3?'':$t3_c3->data['blood_rh_if_needed'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t3_c1?'fa-square':($t3_c1->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c1?'fa-square':($t3_c1->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c1?'fa-square':($t3_c1->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	              </td>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t3_c2?'fa-square':($t3_c2->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c2?'fa-square':($t3_c2->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c2?'fa-square':($t3_c2->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	              </td>
	              <td>
	                Treatments:
	                <ul class="list-unstyled">
	                  <li>
	                    <i class="far {{ !$t3_c3?'fa-square':($t3_c3->data['treatments']=='Antiretroviral (ARV)' ? 'fa-check-square' : 'fa-square') }}"></i> Antiretroviral (ARV)
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c3?'fa-square':($t3_c3->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
	                  </li>
	                  <li>
	                    <i class="far {{ !$t3_c3?'fa-square':($t3_c3->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
	                  </li>
	              </td>
	            </tr>
	            
	            <tr>
	              <td>
	                Return Date:
	                <b>{{ empty(!$t3_c1?'':$t3_c1->data['return_date'])?'':date('M d, Y', strtotime($t3_c1->data['return_date'])) }}</b>
	              </td>
	              <td>
	                Return Date:
	                <b>{{ empty(!$t3_c2?'':$t3_c2->data['return_date'])?'':date('M d, Y', strtotime($t3_c2->data['return_date'])) }}</b>
	              </td>
	              <td>
	                Return Date:
	                <b>{{ empty(!$t3_c3?'':$t3_c3->data['return_date'])?'':date('M d, Y', strtotime($t3_c3->data['return_date'])) }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Health Service Provider:
	                <b>{{ !$t3_c1?'':$t3_c1->data['health_service_provider'] }}</b>
	              </td>
	              <td>
	                Health Service Provider:
	                <b>{{ !$t3_c2?'':$t3_c2->data['health_service_provider'] }}</b>
	              </td>
	              <td>
	                Health Service Provider:
	                <b>{{ !$t3_c3?'':$t3_c3->data['health_service_provider'] }}</b>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                Hospital Referral:
	                <b>{{ !$t3_c1?'':$t3_c1->data['hospital_referral'] }}</b>
	              </td>
	              <td>
	                Hospital Referral:
	                <b>{{ !$t3_c2?'':$t3_c2->data['hospital_referral'] }}</b>
	              </td>
	              <td>
	                Hospital Referral:
	                <b>{{ !$t3_c3?'':$t3_c3->data['hospital_referral'] }}</b>
	              </td>
	            </tr>
	          </tbody>
	        </table>
	      </div>
	      @endforeach

			@endif
			
			<p>Printed by: {{ Auth::user()->fullname }}</p>
		</div>
		@endforeach
	</div>
	@endif

</body>
</html>
