@extends('layouts.app-admin', ['page' => 'new_prescription'])

@section('content')

<style>
.line{
  border-bottom: 2px solid black;
  box-shadow: 0px 2px 5px black;
}
</style>
<div class="content-wrapper">
	<section class="content">
		<form method="post" action="">
			@csrf

			<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">New Prescription</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            
              </div>
            </div>
            <div class="box-body">
            	<div class='row'>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <label>Select Patient</label>
                  <select id="patient_id" name="patient_id" required class="form-control select2">
                    <option value="">Select Patient</option>
                    @foreach($allPatients as $ap)
                    <option value="{{ $ap->id }}">{{ $ap->patient_name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Visit Date (MM:DD:YYYY)</label>
                <input type="text" id="visit_date" name="visit_date" required class="form-control dtp">
                </div>

                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                <label>BP</label>
                <input type="text" id="bp" name="bp" required class="form-control">
                </div>

                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                <label>Weight</label>
                <input type="text" id="weight" name="weight" required class="form-control">
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Next Visit Date (MM:DD:YYYY)</label>
                <input type="text" id="next_visit_date" name="next_visit_date" required class="form-control dtp">
                </div>
            	</div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <hr class="line" />
                </div>
              </div>


              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Select Medicine</label>
                  <select id="medicine" class="form-control select2">
                    <option value="">Select Medicine</option>
                    @foreach($allMedicines as $am)
                    <option value="{{ $am->id }}">{{ $am->medicine_name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Select Packing</label>
                  <select id="packing" class="form-control select2"></select>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  <label>Quantity</label>
                  <input type="text" id="quantity" class="form-control" />
                </div>

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  <label>Dosage</label>
                  <input type="text" id="dosage" class="form-control" />
                </div>

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  <label>&nbsp</label>
                  <button type="button" id="add_medicine_to_list" class="btn btn-success btn-block">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>

              <div class="clearfix">&nbsp;</div>
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
              <table class="table table-bordered" id="medicines_table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Medicine Name</th>
                    <th>Packing</th>
                    <th>Quantity</th>
                    <th>Dosage</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="medicines_list">
                  
                </tbody>
              </table>
           	</div>
           </div>

           <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <hr class="line" />
                </div>
            </div>

              <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <label>Select Disease</label>
              <select id="diseases" class="form-control select2">
              <option value="">Select Disease</option>
              @foreach($allDiseases as $ad)
              <option value="{{ $ad->id }}">{{ $ad->disease_name }}</option>
              @endforeach
            </select>
              </div>
              <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
              <label>&nbsp</label>
              <button class="btn btn-success btn-block" type="button" id="add_to_disease_list">
                <i class="fa fa-plus"></i>
              </button>
              </div>
            </div>

            <div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
              <table id="disease_list_table" class="table table-bordered">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Disease Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="disease_list">
                  
                </tbody>
              </table>
            </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <hr class="line" />
                </div>
            </div>

            <div class="row">
              <div clas="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <label>Select Test</label>
                <select id="lab_tests" class="form-control select2">
                <option value="">Select Lab Test</option>
              </select>
              </div>

              <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                <label>Test Result</label>
                <input type="text" id="test_result" class="form-control" />
              </div>

              <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12">
                <label>&nbsp;</label>
                <button type="button" id="add_test_to_list" class="btn btn-success btn-block">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
              </div>
              <div class="clearfix">&nbsp;</div>
              <div class="clearfix">&nbsp;</div>

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                <table id="tests_table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Test Name</th>
                      <th>Result</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="test_list_table">
                    
                  </tbody>
                </table>
              </div>

            </div>
            
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" id="submit" name="submit" class="btn btn-success pull-right"></button>
              </div>
            </div>
          </div>
            </div>

		</form>
	</section>
</div>

<script>
  let medicineSerial = 1;
  let diseaseSerial = 1;
  let testSerial = 1;
  $(document).ready(function() {

    $("#medicine").change(function() {
      let medicineId = $(this).val();
      $("#packing").html('');

      if (medicineId !== '') {
        $.ajax({
          url: "{{ route('get_medicine_packing') }}",
          type: "GET",
          data: {
            "medicine_id": medicineId
          },
          cache: false,
          success: function(data) {
            $("#packing").html(data);
          },
          error: function(jqXhr, textStatus, errorMessage) {
            showCustomMessage(errorMessage);
            console.log(jqXhr);
            console.log(textStatus);
          }
        });


      }
    });
$("#add_medicine_to_list").click(function () {
      let medicineName = $('#medicine option:selected').text().trim();
      let packing = $('#packing option:selected').text().trim();
      let medicineDetailId = $("#packing").val().trim();
      let quantity = $("#quantity").val().trim();
      let dosage = $("#dosage").val().trim();

      if(medicineName !== '' && packing !== '' && quantity !== '' && dosage !== ''){
        let data = "<tr>";
        data = data + "<td class='medicine_serial'>" + medicineSerial + "</td>";
        data = data + "<td>" + medicineName + "</td>";
        data = data + "<td>" + packing + " </td>";
        data = data + "<td>" + quantity +" </td>";
        data = data + "<td>" + dosage + "</td>";
        data = data + "<td><button type='button' class='btn btn-danger' onclick='deleteMedicineRow(this);'><i class='fa fa-times'></i></button></td>";
        data = data + "</tr>";

        let oldData = $("#medicines_list").html();
        let newData = oldData + data;
        $("#medicines_list").html(newData);

        $("#quantity").val('');
        $("#dosage").val('');
        $("#medicine").val('');
        $("#packing").html('');
        $("#packing").val('');

        medicineSerial++;
      } else{
        showCustomMessage("Please fill all text boxes");
      }

    });
    $("#add_to_disease_list").click(function(){
      let diseaseId = $("#diseases").val();
      let diseaseName = $('#diseases option:selected').text().trim();
      if(diseaseName !== ''){
        let oldData = $("#disease_list").html();
        let newData = '<tr>';
        newData = newData + "<td class='disease_serial'>" + diseaseSerial + "</td>";
        newData = newData + "<td>" + diseaseName + "</td>";
        newData = newData + "<td><button type='button' class='btn btn-danger' onclick='deleteDiseaseRow(this);'><i class='fa fa-times'></i></button></td>";

        newData = oldData + newData;
        $("#disease_list").html(newData);
        diseaseSerial++;
      }
    });

    $("#add_test_to_list").click(function(){
      let testName = $('#lab_tests option:selected').text().trim();
      let testResult = $('#test_result').val().trim();

      if (testName !== '' &&  testResult !== ''){
        let data = "<tr>";
        data = data + "<td class='test_serial'>" + testSerial + "</td>";
        data = data + "<td>" + testName + "</td>";
        data = data + "<td>" + testResult + " </td>";
        data = data + "<td><button type='button' class='btn btn-danger' onclick='deleteTestRow(this);'><i class='fa fa-times'></i></button></td>";
        data = data + "</tr>";

        let oldData = $("#test_list").html();
        let newData = oldData + data;

        $("#test_list").html(newData);

        $("#test_result").val('');
        $("#lab_tests").val('');
        $("#lab_tests").select2();
        testSerial++;
      } else{
        showCustomMessage("Please fill all the text boxes");
      }
    })
 
    function deleteMedicineRow(obj){
        let rowIndex = obj.parentNode.parentNode.rowIndex;
        let tableObject = document.getElementById("medicines_table");
        tableObject.deleteRow(rowIndex);
        reArrangeSerials();
    }

    function reArrangeSerials(){
        medicineSerial = 1;
        $(".medicine_serial").each(function(){
          $(this).html(medicineSerial);
          medicineSerial++;
        });
      }

    function deleteDiseaseRow(obj){
      let rowIndex = obj.parentNode.parentNode.rowIndex;
      let tableObject = document.getElementById("disease_list_table");
      tableObject.deleteRow(rowIndex);
      reArrangeDiseaseSerials();
    }

    function reArrangeDiseaseSerials(){
      diseaseSerial = 1;
      $(".disease_serial").each(function(){
        $(this).html(diseaseSerial);
        diseaseSerial++;
    })
};

    function deleteTestRow(obj){
      let rowIndex = obj.parentNode.parentNode.rowIndex;
      let tableObject = document.getElementById("tests_table");
      tableObject.deleteRow(rowIndex);
      reArrangeTestSerials();
    }

    function reArrangeDiseaseSerials(){
      testSerial = 1;
      $(".test_serial").each(function(){
        $(this).html(testSerial);
        testSerial++;
    })
};        
})
</script>
@endsection