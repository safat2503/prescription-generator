@extends('layouts.app-admin', ['page' => 'patient_registration'])

@section('content')

@php
$panelHeading = "Patient Registration";
$btnLabel = "Save";
@endphp

<div class="content-wrapper">
	<section class="content">
		<form method="post" action=" {{ route('patient.store') }}">
		@csrf

		@include('patients.form')
		</form>
	<div class="clearfix">&nbsp;</div>
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Patients</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            
              </div>
            </div>
            <div class="box-body">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
            		<table class="table table-bordered table-striped">
            			<thead>
            				<tr>
            					<th>S.No</th>
            					<th>Patient Name</th>
            					<th>Date of Birth</th>
            					<th>Gender</th>
            					<th>Phone Number</th>
            					<th>Action</th>
            				</tr>
            			</thread>
            			<tbody>
            				<?php
            				$counter = 1;
            				?>
            				@foreach($allPatients as $ap)
            				<tr>
            					<td>{{ $counter }}</td>
            					<td>{{ $ap->patient_name }}</td>
            					<?php

            						$dob = $ap->date_of_birth;
            						$dateObj = date_create($dob);
            						$formattedDate = date_format($dateObj, "d-M-Y");
            					?>

            					<td>{{ $formattedDate }}</td>
            					<td>{{ $ap->gender == 1? 'Male' : 'Female' }}</td>
            					<td>{{ $ap->phone_number }}</td>
            					<td>
            						<a class="btn btn-primary" href="{{ url('/patient/edit') }}/{{ $ap->id }}">
            							<i class="fa fa-edit"></i>
            						</a>
            					</td>
            				</tr>
            				<?php
            				$counter+=1;
            				?>
            				@endforeach

            				
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
	</section>
</div>
@endsection