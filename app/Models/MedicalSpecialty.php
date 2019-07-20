<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalSpecialty extends Model
{
    protected $fillable = ['name', 'medical_id'];

    public function medical()
    {
        return $this->belongsTo(MedicalField::class, 'medical_id');
    }
}
