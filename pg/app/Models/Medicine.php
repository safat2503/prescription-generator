<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['medicine_name'];

    public function medicineDetail(){
        //one to many relationship
        return $this->hasMany(MedicineDetail::class);
    }
}
