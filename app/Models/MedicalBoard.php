<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalBoard extends Model
{
    protected $fillable = [
        'registration_number', 'name', 'field', 'registration_date', 'user_id', 'emp_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function employ()
    {
        return $this->belongsTo(Employ::class);
    }
}
