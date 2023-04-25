<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\MedicineDetail;

class CommonController extends Controller
{
    public function changeDateToMysql($date){
        $dateArr = explode("/", $date);
        $mysqlDate = $dateArr[2].'-'.$dateArr[0].'-'.$dateArr[1];
        return $mysqlDate;
    }

    public function getAllMedicines(){
        $allMedicines = Medicine::orderBy('medicine_name')->get();
        return $allMedicines;
    }
}
