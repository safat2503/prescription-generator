<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisit extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'patient_id', 
        'visit_date', 
        'bp', 
        'weight'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
