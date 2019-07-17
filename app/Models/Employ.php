<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employ
 *
 * @property int $id
 * @property string $job_title
 * @property string $graduation_date
 * @property string $birth_of_date
 * @property string $address
 * @property int $years_of_experience
 * @property string $cv
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MedicalBoard $medical_board
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereBirthOfDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereGraduationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereYearsOfExperience($value)
 * @mixin \Eloquent
 */
class Employ extends Model
{
    protected $fillable = [
        'job_title', 'graduation_date', 'birth_of_date', 'address', 'years_of_experience', 'cv', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function medical_board()
    {
        return $this->hasOne(MedicalBoard::class);
    }
}
