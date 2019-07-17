<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MedicalBoard
 *
 * @property int $id
 * @property string $registration_number
 * @property string $name
 * @property string $field
 * @property string $registration_date
 * @property int $user_id
 * @property int $employ_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employ $employ
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereEmpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalBoard whereUserId($value)
 * @mixin \Eloquent
 */
class MedicalBoard extends Model
{
    protected $fillable = [
        'registration_number', 'name', 'field', 'registration_date', 'user_id', 'employ_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function employ()
    {
        return $this->belongsTo(Employ::class);
    }
}
