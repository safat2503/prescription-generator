<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'medicine_id',
        'packing'
    ];

    public function medicine(){
        //many to one
        return $this->belongsTo(Medicine::class);
    }
}
