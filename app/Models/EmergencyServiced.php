<?php

namespace App\Models;

use App\Models\Auth\User\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

/**
 * @SWG\Definition(
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
}
