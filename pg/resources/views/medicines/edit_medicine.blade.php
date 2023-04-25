@extends('layouts.app-admin', ['page' => 'add_medicine'])

@section('content')
<?php
	$panelHeading = 'Update Medicine';
	$btnLabel = 'Update';
?>
<div class="content-wrapper">
	<section class="content">
<form method="post" action="{{ route('update.medicine') }}">
	@csrf

	@include('medicines.medicine-form')
</form>


			</section>
		</div>
@endsection