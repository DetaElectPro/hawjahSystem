<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    protected $fillable = [
        'job_title', 'graduation_date', 'birth_of_date', 'address', 'years_of_experience', 'cv', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function medical_board()
    {
        return $this->hasOne(MedicalBoard::class);
    }
}
