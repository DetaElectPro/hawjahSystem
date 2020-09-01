<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorProfile extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'about_me', 'username', 'language', 'available', 'percentage'];


    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

}
