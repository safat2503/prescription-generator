@extends('layouts.app-admin', ['page' => 'add_medicine'])

@section('content')
<?php
	$panelHeading = 'Add Medicine';
	$btnLabel = 'Save';
?>
<div class="content-wrapper">
	<section class="content">
		<form method="post" action="{{ route('medicine.store') }}">
			@csrf

			@include('medicines.medicine-form')
		</form>

		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">All Medicines</h3>
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
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$serial = 1;
								?>
								@foreach($allMedicines as $am)
									<tr>
										<td>{{ $serial }}</td>
										<td>{{ $am->medicine_name }}</td>
										<td>
											<a href="{{ url('/medicine/edit') }}/{{ $am->id }}" class="btn btn-success">
												<i class="fa fa-edit"></i>
											</a>
										</td>
									</tr>
									<?php $serial++;?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
