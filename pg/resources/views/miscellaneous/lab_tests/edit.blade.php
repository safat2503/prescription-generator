@extends('layouts.app-admin', ['page' => 'lab_test'])

@section('content')
@php
$panelHeading = "Update Lab Test";
$btnLabel = "Update";
@endphp


<div class= "content-wrapper">
	<section class="content">
	<form method="post" action="{{ route('lab.test.update')}}">
		@csrf
		@include ('miscellaneous.lab_tests.form')
	</form>
</section>
</div>
@endsection