<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorAwardsRecognitions extends Model
{

    use SoftDeletes;
    protected $fillable = ['name', 'given_by', 'country', 'date'];


    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
