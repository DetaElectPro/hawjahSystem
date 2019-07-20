<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalField extends Model
{
    protected $fillable = ['name'];

    public function specialty()
    {
        return $this->hasMany(MedicalSpecialty::class, 'medical_id');
    }
}
