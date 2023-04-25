@extends('layouts.app-admin', ['page' => 'patient_registration'])

@section('content')

@php
$panelHeading = "Update Patient";
$btnLabel = "Update";
@endphp

<div class="content-wrapper">
	<section class="content">
		<form method="post" action=" {{ route('patient.update') }}">
		@csrf

		@include('patients.form')
		</form>
	</section>
</div>