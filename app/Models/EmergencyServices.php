<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EmergencyServices
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property float $price_per_day
 * @property int $available_bed
 * @property string $type
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereAvailableBed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices wherePricePerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyServices whereUserId($value)
 * @mixin \Eloquent
 */
class EmergencyServices extends Model
{
    protected $table = 'emergency_services';
    protected $fillable = ['name', 'address', 'price_per_day', 'available_bed', 'type', 'user_id'];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'price_per_day' => 'float',
        'available_bed' => 'integer',
        'type' => 'string',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3',
        'address' => 'required|min:3',
        'price_per_day' => 'required',
        'available_bed' => 'required|min:1',
        'type' => 'required|min:3',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

