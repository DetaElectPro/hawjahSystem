<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FeaturedCenters extends Model
{
    protected $fillable = ['name', 'rate'];
    protected $table = 'featured_centers';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
