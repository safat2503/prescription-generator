@extends('layouts.app-admin', ['page' => 'medicine_details'])

@section('content')

@php
	$panelHeading = 'Add Medicine Details';
	$btnLabel = 'Save';
@endphp

<div class="content-wrapper">
	<section class="content">
		<form method="post" action="{{ route('add.medicine.detail') }}">
			@csrf

			@include('medicines.medicine-detail-form')
		</form>

		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">All Medicines With Packings</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
						<table id="medicines_table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Medicine Name</th>
									<th>Packing</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
								$counter = 1;
								@endphp


								@foreach($resultSet as $rs)

								<tr>
									<td>{{ $counter }}</td>
									<td>{{ $rs->medicine_name }}</td>
									<td>{{ $rs->packing }}</td>\
									<td><a href="{{ url('/medicine/detail/edit') }}/{{ $rs->medicine_detail_id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
								</tr>

								@endforeach
								@php
								$counter++;
								@endphp

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection