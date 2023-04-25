<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Disease;
use Illuminate\Validation\Rule;
use App\Models\LabTest;


class MiscellaneousController extends Controller
{
    public function disease(){
        $allDisease = Disease::orderBy('disease_name')->get();
        $disease = new Disease();
        return view('miscellaneous.disease.index', 
            compact('allDisease', 'disease'));
    }
    public function user(){
        return view('miscellaneous.user');
    }
    public function report(){
        return view('miscellaneous.report');
    }

    public function saveDisease(Request $request){
        $data = $this->validateDisease();
        $message = '';
        
        try{
            DB::beginTransaction();
            Disease::create($data);

            DB::commit();
            $message = 'Disease has been added';
        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('disease.miscellaneous'))->with('message', $message);
    }

    public function diseaseEdit( Disease $disease){
        //bring details from db
        return view('miscellaneous.disease.edit', compact('disease'));
    }

    public function updateDisease(Request $request){
        $data = $this->validateDiseaseUpdate();

         $message = '';
        
        try{
            DB::beginTransaction();
            Disease::find($request->hidden_id)->update($data);

            DB::commit();
            $message = 'Disease has been updated';
        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('disease.miscellaneous'))->with('message', $message);

        
    }
    private function validateDisease(){
        return request()->validate([
            'disease_name' => ['required', 'min:3', 'max:30', Rule::unique('diseases')]
        ]
        );
    }
    private function validateDiseaseUpdate(){
        return request()->validate([
            'disease_name' => ['required', 'min:3', 'max:30', Rule::unique('diseases')->ignore(request()->hidden_id)]
        ]
        );
    }

    public function labTestIndex(){
        $labTest = new LabTest();
        $allTests = Labtest::orderBy("test_name")->get();
        return view('miscellaneous.lab_tests.index', compact('labTest','allTests'));
    }

    public function saveTest(Request $request){
        $data = $this->validateTest();
        $message = '';
        
        try{
            DB::beginTransaction();
            LabTest::create($data);

            DB::commit();
            $message = 'Lab Test has been added';
        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('lab.test.index'))->with('message', $message);

      
    }

    private function validateTest(){
        return request()->validate([
            'test_name' => ['required', 'min:3', 'max:50', Rule::unique('lab_tests')]
        ]
        );
    }
    public function labTestEdit(LabTest $labTest){
        return view('miscellaneous.lab_tests.edit', compact('labTest'));
    }

    public function updateLabTest(Request $request){
        $data = $this->validateTest();
        $hidden_id = $request->hidden_id;
        LabTest::find($hidden_id)->update($data);
        $message = '';
        
        try{
            DB::beginTransaction();
            LabTest::find($hidden_id)->update($data);

            DB::commit();
            $message = 'Lab Test has been updated';
        } catch(QueryException $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect(route('lab.test.index'))->with('message', $message);

      


    }
}
