<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\MedicalField
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|MedicalSpecialty[] $specialty
 * @method static Builder|MedicalField newModelQuery()
 * @method static Builder|MedicalField newQuery()
 * @method static Builder|MedicalField query()
 * @method static Builder|MedicalField whereCreatedAt($value)
 * @method static Builder|MedicalField whereId($value)
 * @method static Builder|MedicalField whereName($value)
 * @method static Builder|MedicalField whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MedicalField extends Model
{
    protected $fillable = ['name'];

    public function specialty()
    {
        return $this->hasMany(MedicalSpecialty::class, 'medical_id');
    }
}
