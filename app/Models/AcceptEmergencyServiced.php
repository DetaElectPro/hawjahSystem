<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AcceptEmergencyServiced
 * @package App\Models
 * @version October 9, 2019, 9:45 am UTC
 *
 * @property string needing
 * @property string image
 * @property string price
 * @property integer emergency_id
 */
class AcceptEmergencyServiced extends Model
{
    use SoftDeletes;

    public $table = 'accept_emergency_serviceds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'needing',
        'image',
        'report',
        'price',
        'emergency_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'needing' => 'string',
        'image' => 'string',
        'report' => 'string',
        'price' => 'string',
        'emergency_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'needing' => 'required',
//        'price' => 'required'
    ];

    
}
