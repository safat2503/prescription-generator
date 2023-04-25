<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\CommonController;
use App\Models\Medicine;
use App\Models\MedicineDetail;
use App\Models\Disease;

class PatientsController extends Controller
{
    public function register(){
        $patient = new Patient();
        $allPatients = Patient::orderBy('patient_name')->get();
        /*
        $query = "select 'id', 'patient_name', date_format('date_of_birth', '%d-%M-%Y') as 'date_of_birth' from patients order by patient_name asc";
            $resultSet = null;
            try{
                $resultSet = DB::select($query);
            }catch(QueryException $ex){
                dd($ex);
            }
            */
        return view('Patients.index', compact('patient', 'allPatients'));
    }

    public function prescription(){
        $allPatients = Patient::orderBy('patient_name')->get();
        $allMedicines = Medicine::orderBy('medicine_name')->get();
        $allDiseases = Disease::orderBy('disease_name')->get();
        return view('Patients.prescription_patient', compact('allPatients','allMedicines', 'allDiseases'));
    }
    public function medication(){
        
        return view('Patients.medication_patient');
    }

    public function store(Request $request){
    $data = $this->validatePatient();
    $dob = $data['date_of_birth'];
    $commonController = new CommonController();
    $mysqlDate = $commonController->changeDateToMysql($dob);
    $data['date_of_birth'] = $mysqlDate;
    $message = '';
    
    try{
        DB::beginTransaction();
        Patient::create($data);

        DB::commit();
        $message = 'Patient has been registered';
    } catch(QueryException $ex){
        DB::rollback();
        dd($ex);
    }
    return redirect(route('register.patient'))->with('message', $message);

}

    public function edit(Patient $patient){
        $dateObj = date_create($patient->date_of_birth);
        $formatedDate = date_format($dateObj, 'm/d/Y');
        $patient->date_of_birth = $formatedDate;
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request){
        $data = $this->validatePatient();
        $dob = $data['date_of_birth'];
        $commonController = new CommonController();
        $mysqlDate = $commonController->changeDateToMysql($dob);
        $data['date_of_birth'] = $mysqlDate;
        $message = '';

        try{
            DB::beginTransaction();
            $patient = Patient::find($request->hidden_id)->update($data);
            DB::commit();
            $message = "Patient has been updated";
        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('register.patient'))->with('message', $message);
    }
    private function validatePatient(){
        return request()->validate([
            'patient_name' => ['required', 'min:4', 'max:50'],
            'date_of_birth' => ['required'],
            'gender' => ['required'],
            'phone_number' => ['required', 'min:10', 'max:11']
            ]
        );

    }

    public function getMedicinePackings(){
        $medicineId = request()->medicine_id;
        $packings = MedicineDetail::where('medicine_id', '=', $medicineId)->get();
        $options = '<option value="">Select Packing</option>';
        foreach($packings as $p){
            $options = $options.'<option value="'.$p->id.'">'.$p->packing.'</option>';
        }
        return $options;
    }
}

