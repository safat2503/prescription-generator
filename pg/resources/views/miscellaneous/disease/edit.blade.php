@extends('layouts.app-admin', ['page' => 'disease'])

@section('content')
@php
$panelHeading = "Update Disease";
$btnLabel = "Update";
@endphp


<div class= "content-wrapper">
	<section class="content">
	<form method="post" action=" {{ route('disease.miscellaneous.update') }}">
		@csrf
		@include ('miscellaneous.disease.form')
	</form>
</section>
</div>
@endsection