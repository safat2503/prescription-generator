@extends('layouts.app-admin', ['page' => 'lab_test'])

@section('content')

@php
$panelHeading = "Add Lab Test";
$btnLabel = "Save";
@endphp

<div class= "content-wrapper">
  <section class="content">
  <form method="post" action=" {{ route('lab.test.save') }}" onsubmit="return validate();">
    @csrf
    @include ('miscellaneous.lab_tests.form')
  </form>

  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>


          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Lab Tests</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            
              </div>
            </div>
            <div class="box-body">
              <div class="row table-responsive">
          <table id="diseases" class="table table-bordered table-striped">
            <thead> 
              <tr>
                <th>S.No</th>
                <th>Test Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php
              $counter = 1;
              @endphp
              @foreach($allTests as $ad)
              <tr> 
                <td>{{ $counter }}</td>
                <td>{{ $ad->test_name }}</td>
                <td>
                  <a href="{{ url('/lab/test/edit') }}/{{ $ad->id}}" class="btn btn-primary">
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
        </div>
      </section>
</div>

<script>
  function validate(){
    let testName = $("#test_name").val().trim();
    $("#test_name").val(testName);
    let status = false;
    let length = testName.length;

    if (length>=3){
      status = true;
    } else if(length === 0){
      showCustomMessage("Empty form cannot be submitted");
    } else if(length<3){
      showCustomMessage("Test name should contain at least 3 characters");
    }
    return status;
  }
</script>
@endsection
