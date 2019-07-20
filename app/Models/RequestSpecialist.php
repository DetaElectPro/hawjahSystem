<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RequestSpecialist extends Model
{
    protected $fillable = ['name', 'address', 'start_time', 'end_time', 'price', 'medical_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialties()
    {
        return $this->belongsTo(MedicalSpecialty::class, 'medical_id');
    }
}
