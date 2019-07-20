<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MedicalField
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MedicalSpecialty[] $specialty
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MedicalField extends Model
{
    protected $fillable = ['name'];

    public function specialty()
    {
        return $this->hasMany(MedicalSpecialty::class, 'medical_id');
    }
}
