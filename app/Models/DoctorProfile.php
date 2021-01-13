<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorProfile extends Model
{
    use SoftDeletes;

    protected $fillable = ["doctor_id", "about_me", "username", "language", "available", "percentage"];
    protected $table = 'doctor_profiles';


    public function doctor()
    {
        return $this->belongsTo(User::class, "doctor_id");
    }

}
