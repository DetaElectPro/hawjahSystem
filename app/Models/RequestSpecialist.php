<?php

namespace App\Models;

use App\Http\Controllers\Api\AcceptRequestApiController;
use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RequestSpecialist
 *
 * @property-read MedicalSpecialty $specialties
 * @property-read User $user
 * @method static Builder|RequestSpecialist newModelQuery()
 * @method static Builder|RequestSpecialist newQuery()
 * @method static Builder|RequestSpecialist query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $price
 * @property string $start_time
 * @property string $end_time
 * @property int $medical_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereMedicalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialist whereUserId($value)
 */
class RequestSpecialist extends Model
{
    protected $fillable = ['name', 'address', 'start_time', 'end_time', 'price', 'medical_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialties()
    {
        return $this->belongsTo(MedicalSpecialty::class, 'medical_id');
    }

    public function acceptRequest()
    {
        return $this->hasOne(AcceptRequest::class, 'request_id');
    }
}
