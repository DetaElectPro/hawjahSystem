<?php

namespace App\Models;

use App\Models\Auth\User\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\EmergencyServiced
 *
 * @SWG\Definition (
 *      definition="EmergencyServiced",
 *      required={"name", "address", "price_per_day", "type", "available"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="price_per_day",
 *          description="price_per_day",
 *          type="float",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="available",
 *          description="available",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 * @property int $id
 * @property string $name
 * @property string $address
 * @property float $price_per_day
 * @property string $type
 * @property int $available
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\AcceptEmergencyServiced $emergency
 * @property-read \App\Models\Auth\User\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmergencyServiced onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced wherePricePerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmergencyServiced withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmergencyServiced withoutTrashed()
 * @mixin \Eloquent
 */
class EmergencyServiced extends Model
{
    use SoftDeletes,Sortable;

    public $table = 'emergency_serviceds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'address',
        'price_per_day',
        'type',
        'available',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'price_per_day' => 'double',
        'type' => 'string',
        'available' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3|max:191',
        'address' => 'required|min:3|max:191',
        'price_per_day' => 'required|min:1',
        'type' => 'required|min:3|max:60',
        'available' => 'required|min:1'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function emergency()
    {
        return $this->hasOne(AcceptEmergencyServiced::class, 'emergency_id');
    }
}
