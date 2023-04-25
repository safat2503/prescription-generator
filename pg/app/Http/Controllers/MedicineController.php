<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Medicine;
use App\Models\MedicineDetail;
use Illuminate\Validation\Rule;

class MedicineController extends Controller
{
    public function medicine(){
        $medicine = new Medicine();
        $allMedicines = Medicine::orderBy('medicine_name')->get();
        return view('medicines.add_medicine', compact('medicine', 'allMedicines'));
    }
    public function medicineDetail(){
        $medicineDetail = new MedicineDetail();
        $commonController = new CommonController();
        $allMedicines = $commonController->getAllMedicines();

        $query = "SELECT m.medicine_name, md.id as medicine_detail_id , md.packing from medicines as m, medicine_details as md where m.id = md.medicine_id order by m.medicine_name asc, md.id asc;";


        $resultSet = array();
        try{
            $resultSet = DB::select($query);

        } catch(QueryException $ex){
            dd($ex);
        }

        return view('medicines.medicine_details', compact('medicineDetail', 'allMedicines', 'resultSet'));
    }
    public function storeMedicine(Request $request){
        $message = '';

        $data = $this->validateMedicine();
        try{
            DB::beginTransaction();
            Medicine::create($data);

            DB::commit();
            $message = 'Medicine saved';

        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('medicine.medicines'))->with('message', $message);
    }
    private function validateMedicine(){
        return request()->validate([
            'medicine_name' => ['required', 'min:4', 'max:70', Rule::unique('medicines')->ignore(request()->hidden_id)
        ]
    ]
);
    }

    public function editMedicine(Medicine $medicine){
        return view('medicines.edit_medicine', compact('medicine'));
    }

    public function updateMedicine(Request $request){
        $data = $this->validateMedicine();
        $message = '';

        try{
            DB::beginTransaction();
            $medicine = Medicine::find($request->hidden_id);
            $medicine->update($data);
            DB::commit();

            $message = 'Medicine updated';
        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('medicine.medicines'))->with('message', $message);
    }

    public function saveMedicineDetail(Request $request){
        $data = $this->validateMedicineDetail();
        $message = '';

        try{
            DB::beginTransaction();

            MedicineDetail::create($data);

            DB::commit();

            $message = 'Medicine details updated';
        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('medicine_details.medicines'))->with('message', $message);

    }
    private function validateMedicineDetail(){
        return Request()->validate([
            'medicine_id' => ['required'],
            'packing' => ['required', 'min:4', 'max:40']
        ]
    );
    }
    public function editMedicineDetail(MedicineDetail $medicineDetail){
        $commonController = new CommonController();
        $allMedicines = $commonController->getAllMedicines();

        return view('medicines.edit_medicine_details', compact('medicineDetail', 'allMedicines'));  
    }

    public function updateMedicineDetails(Request $request){
    $medicineDetailsId = $request->hidden_id;

    $data = $this->validateMedicineDetail();

    $message = '';
    try{
        DB::beginTransaction();
        $medicineDetail = MedicineDetail::find($medicineDetailsId);
        $medicineDetail->update($data);
        DB::commit();
        $message = 'Medicine details updated';
    } catch(QueryException $ex){
        DB::rollback();
        dd($ex);
    }
    return redirect(route('medicine_details.medicines'))->with('message', $message);
}



}

