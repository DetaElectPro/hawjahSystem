<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EmergencyServiced extends Model
{
    protected $fillable = ['name', 'address', 'price_per_day', 'available_bed', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

