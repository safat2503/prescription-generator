@extends('layouts.app-admin', ['page' => 'medicine_details'])

@section('content')

@php
	$panelHeading = 'Update Medicine Details';
	$btnLabel = 'Update';
@endphp

<div class="content-wrapper">
	<section class="content">
		<form method="post" action="{{ route('update.medicine.details') }}">
			@csrf

			@include('medicines.medicine-detail-form')
		</form>

	
	</section>
</div>
@endsection