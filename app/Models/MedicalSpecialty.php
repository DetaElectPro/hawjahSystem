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
 * @property-read \App\Models\MedicalField $medical
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereMedicalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereUpdatedAt($value)
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
