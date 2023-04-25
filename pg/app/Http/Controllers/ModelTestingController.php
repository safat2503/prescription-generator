<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\MedicineDetail;
use App\Models\Disease;

class ModelTestingController extends Controller
{
    public function testMedicine(){
        /*
        $data = array('medicine_name' => 'Augmentin');
        Medicine::create($data);

        $data = array('medicine_name' => 'Paracetamol');
        Medicine::create($data);
        */
        /*
        $data = array('medicine_id' => 1, 'packing' => '125mg');
        MedicineDetail::create($data);

        $data = array('medicine_id' => 1, 'packing' => '375mg');
        MedicineDetail::create($data);
    */

        $records = Medicine::find(1);
        dump($records);

        $records = Medicine::find(1)->medicineDetail;
        dump($records);

        dd('data saved.');

        /**
    $query = "select 'm'. 'id', 'm'.'medicine_name',
    'md'. 'packing' from 'medicines' as 'm', 'medicine_details' as 'md' where 'm'.'id' = 'md'.'medicine_id' and 'm'.'id' = 1;";
    $stmt->$con->prepare($query);
    $stmt->execute();
        */
    }

    public function testAddDisease(){
    
        $data = array('disease_name'=>'High Blood Pressure');
        $disease = Disease::create($data);

        $data = array('disease_name'=>'High Sugar');
        $disease = Disease::create($data);
        dump($disease->id);
        dump($disease->disease_name);
        dd('checkin');
    }

    public function getAllDiseases(){
        $diseases = Disease::where('id', '>', 1)->orderBy('id')->get();
        dd($diseases);

    }
}
