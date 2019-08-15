<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedCenters extends Model
{
    protected $fillable = ['name', 'rate'];
    protected $table = 'featured_centers';


}
