<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DoctorDegreesCertification extends Model
{
    protected $fillable = ['name', 'location', 'country', 'date'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
