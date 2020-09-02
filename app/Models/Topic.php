<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'status'];

    public function doctorTopic()
    {
        return $this->hasMany(DoctorTopic::class, 'topic_id');
    }
}
