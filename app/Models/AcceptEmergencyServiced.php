<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AcceptEmergencyServiced
 *
 * @package App\Models
 * @version October 9, 2019, 9:45 am UTC
 * @property string needing
 * @property string image
 * @property string report
 * @property string user_id
 * @property string price
 * @property integer emergency_id
 * @property int $id
// * @property string $needing
// * @property string $image
// * @property float $price
// * @property int $emergency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\EmergencyServiced $emergency
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AcceptEmergencyServiced onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced whereEmergencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced whereNeeding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptEmergencyServiced whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AcceptEmergencyServiced withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AcceptEmergencyServiced withoutTrashed()
 * @mixin \Eloquent
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
        'price' => 'double',
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


    public function emergency()
    {
        return $this->belongsTo(EmergencyServiced::class, 'emergency_id');
    }

    public function userRequest()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
