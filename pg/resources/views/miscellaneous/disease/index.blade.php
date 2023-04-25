@extends('layouts.app-admin', ['page' => 'disease'])

@section('content')

@php
$panelHeading = "Add Disease";
$btnLabel = "Save";
@endphp

<div class= "content-wrapper">
	<section class="content">
	<form method="post" action={{ route('misc.disease.save') }}>
		@csrf
		@include ('miscellaneous.disease.form')
	</form>

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>


          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Diseases</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            
              </div>
            </div>
            <div class="box-body">
              <div class="row table-responsive">
    			<table id="diseases" class="table table-bordered table-striped">
    				<thread>	
    					<tr>
    						<th>S.No</th>
    						<th>Disease Name</th>
    						<th>Action</th>
    					</tr>
    				</thread>
    				<tbody>
    					@php
    					$counter = 1;
    					@endphp
    					@foreach($allDisease as $ad)
    					<tr> 
    						<td>{{ $counter }}</td>
    						<td>{{ $ad->disease_name }}</td>
    						<td>
    							<a href="{{ url('/miscellaneous/disease/edit') }}/{{ $ad->id}}" class="btn btn-primary">
    								<i class="fa fa-edit"></i>
    							</a>
    						</td>
    					</tr>
    					@php
    					$counter++;
    					@endphp
    					@endforeach
    				</tbody>
    			</table>

            </div>
          
          </div>

        </section>


</div>
@endsection