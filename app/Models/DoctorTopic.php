<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorTopic extends Model
{
    use SoftDeletes;

    protected $fillable = ['doctor_id', 'topic_id'];

    public function setDoctorIdAttribute($doctor_id)
    {
        if (!empty($doctor_id)) {
            $this->attributes['doctor_id'] = auth('api')->user()->id;
        }
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
