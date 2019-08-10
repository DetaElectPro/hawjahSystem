<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EmergencyServiced
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereAvailableBed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced wherePricePerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereUserId($value)
 * @mixin \Eloquent
 */
class EmergencyServiced extends Model
{
    protected $fillable = ['name', 'address', 'price_per_day', 'available_bed', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

