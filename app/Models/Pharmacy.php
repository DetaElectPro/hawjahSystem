<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pharmacy
 *
 * @package App\Models
 * @version September 20, 2019, 5:19 pm UTC
 * @property string name
 * @property float longitude
 * @property int $id
 * @property string $name
 * @property float $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Pharmacy onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Pharmacy withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Pharmacy withoutTrashed()
 * @mixin \Eloquent
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
