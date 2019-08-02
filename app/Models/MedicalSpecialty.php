<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MedicalSpecialty
 *
 * @property int $id
 * @property string $name
 * @property int $medical_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read MedicalField $medical
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty query()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereMedicalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MedicalSpecialty extends Model
{
    protected $fillable = ['name', 'medical_id'];

    public function medical()
    {
        return $this->belongsTo(MedicalField::class, 'medical_id');
    }
}
