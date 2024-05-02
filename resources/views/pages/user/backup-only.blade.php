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

@php
  $t1_c1 = $pregnant->prenatals()->where([['trimester', '1st'],['checkup_order', '1']])->first();
  $t1_c2 = $pregnant->prenatals()->where([['trimester', '1st'],['checkup_order', '2']])->first();
  $t1_c3 = $pregnant->prenatals()->where([['trimester', '1st'],['checkup_order', '3']])->first();

  $t2_c1 = $pregnant->prenatals()->where([['trimester', '2nd'],['checkup_order', '1']])->first();
  $t2_c2 = $pregnant->prenatals()->where([['trimester', '2nd'],['checkup_order', '2']])->first();
  $t2_c3 = $pregnant->prenatals()->where([['trimester', '2nd'],['checkup_order', '3']])->first();

  $t3_c1 = $pregnant->prenatals()->where([['trimester', '3rd'],['checkup_order', '1']])->first();
  $t3_c2 = $pregnant->prenatals()->where([['trimester', '3rd'],['checkup_order', '2']])->first();
  $t3_c3 = $pregnant->prenatals()->where([['trimester', '3rd'],['checkup_order', '3']])->first();

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

<section class="content">
	<div class="container-fluid" style="padding-bottom: 50px;">
    <style type="text/css">
      ul.list-unstyled li {
        padding-left: 20px;
      }
      table.table {
        background-color: white;
      }
    </style>
    <div class="row">
      <div class="col-sm-12 table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr><th colspan="3">Pregnant Period Details</th></tr>
            <tr>
              <th>
                <i class="fas fa-weight mr-1"></i> Weight
              </th>
              <th>
                <i class="fas fa-calendar mr-1"></i> Last Period
              </th>
              <th>
                <i class="fas fa-calendar mr-1"></i> Estimated Confinement
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                {{ $pregnant->weight }}
              </td>
              <td>
                {{ date('M d, Y', strtotime($pregnant->last_period)) }}
              </td>
              <td>
                {{ date('M d, Y', strtotime($pregnant->expected_delivery)) }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>


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
                    {!! !$t1_c1?'':($t1_c1->data['discussion_services_given']['birth_plan']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
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
                    {!! !$t1_c2?'':($t1_c2->data['discussion_services_given']['birth_plan']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
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
                    {!! !$t1_c3?'':($t1_c3->data['discussion_services_given']['birth_plan']=='true'?'<i class="far fa-check-square"></i>':'-') !!}  
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
                    <i class="far {{ !$t2_c1?'':($t2_c1->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
                  </li>
                  <li>
                    <i class="far {{ !$t2_c1?'':($t2_c1->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
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
                    <i class="far {{ !$t2_c2?'':($t2_c2->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
                  </li>
                  <li>
                    <i class="far {{ !$t2_c2?'':($t2_c2->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
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
                    <i class="far {{ !$t2_c3?'':($t2_c3->data['treatments']=='Bacteriuria' ? 'fa-check-square' : 'fa-square') }}"></i> Bacteriuria
                  </li>
                  <li>
                    <i class="far {{ !$t2_c3?'':($t2_c3->data['treatments']=='Anemia' ? 'fa-check-square' : 'fa-square') }}"></i> Anemia
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
                <b>{{ $t2_c1->data['health_service_provider'] }}</b>
              </td>
              <td>
                Health Service Provider:
                <b>{{ $t2_c2->data['health_service_provider'] }}</b>
              </td>
              <td>
                Health Service Provider:
                <b>{{ $t2_c3->data['health_service_provider'] }}</b>
              </td>
            </tr>
            <tr>
              <td>
                Hospital Referral:
                <b>{{ $t2_c1->data['hospital_referral'] }}</b>
              </td>
              <td>
                Hospital Referral:
                <b>{{ $t2_c2->data['hospital_referral'] }}</b>
              </td>
              <td>
                Hospital Referral:
                <b>{{ $t2_c3->data['hospital_referral'] }}</b>
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
                Pinag-usapan/Serbisyong ibinigay:
                <ul class="list-unstyled">
                  <li>
                    {!! !$t3_c1?'-':($t3_c1->data['discussion_services_given']['reminder_previous_discussion']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpaalala ng nakaraang tinalakay
                  </li>
                  <li>
                    {!! !$t3_c1?'-':($t3_c1->data['discussion_services_given']['dsg_reminder_postpartum']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpapayo sa postpartum at postnatal care
                  </li>
                  <li>
                    {!! !$t3_c1?'-':($t3_c1->data['discussion_services_given']['dsg_agwat_ng_anak']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpapayo sa pag-agwat ng anak
                  </li>
                  <li>
                    {!! !$t3_c1?'-':($$t3_c1->data['discussion_services_given']['dsg_tetanus_follow_up']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagfollow-up ng Tetanus-containing Vaccine
                  </li>
                </ul>
              </td>
              <td>
                Pinag-usapan/Serbisyong ibinigay:
                <ul class="list-unstyled">
                  <li>
                    {!! !$t3_c2?'-':($t3_c2->data['discussion_services_given']['reminder_previous_discussion']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpaalala ng nakaraang tinalakay
                  </li>
                  <li>
                    {!! !$t3_c2?'-':($t3_c2->data['discussion_services_given']['dsg_reminder_postpartum']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpapayo sa postpartum at postnatal care
                  </li>
                  <li>
                    {!! !$t3_c2?'-':($t3_c2->data['discussion_services_given']['dsg_agwat_ng_anak']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpapayo sa pag-agwat ng anak
                  </li>
                  <li>
                    {!! !$t3_c2?'-':($$t3_c2->data['discussion_services_given']['dsg_tetanus_follow_up']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagfollow-up ng Tetanus-containing Vaccine
                  </li>
                </ul>
              </td>
              <td>
                Pinag-usapan/Serbisyong ibinigay:
                <ul class="list-unstyled">
                  <li>
                    {!! !$t3_c3?'-':($t3_c3->data['discussion_services_given']['reminder_previous_discussion']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpaalala ng nakaraang tinalakay
                  </li>
                  <li>
                    {!! !$t3_c3?'-':($t3_c3->data['discussion_services_given']['dsg_reminder_postpartum']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpapayo sa postpartum at postnatal care
                  </li>
                  <li>
                    {!! !$t3_c3?'-':($t3_c3->data['discussion_services_given']['dsg_agwat_ng_anak']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagpapayo sa pag-agwat ng anak
                  </li>
                  <li>
                    {!! !$t3_c3?'-':($$t3_c3->data['discussion_services_given']['dsg_tetanus_follow_up']=='true'?'<i class="far fa-check-square"></i>':'-') !!} Pagfollow-up ng Tetanus-containing Vaccine
                  </li>
                </ul>
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

    </div>
	</div>
</section>
@endsection

@section('script-code')

@endsection