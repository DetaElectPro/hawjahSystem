<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pharmacy
 * @package App\Models
 * @version September 20, 2019, 5:19 pm UTC
 *
 * @property string name
 * @property float longitude
 */
class Pharmacy extends Model
{
    use SoftDeletes;

    public $table = 'pharmacies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'longitude' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'address string text',
        'longitude' => 'latitude doublee text ii'
    ];

    
}
