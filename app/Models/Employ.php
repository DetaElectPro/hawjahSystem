<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Employ
 *
 * @SWG\Definition (
 *      definition="Employ",
 *      required={"job_title", "graduation_date", "birth_of_date", "address", "years_of_experience"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="job_title",
 *          description="job_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="graduation_date",
 *          description="graduation_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="birth_of_date",
 *          description="birth_of_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="years_of_experience",
 *          description="years_of_experience",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cv",
 *          description="cv",
 *          type="string"
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
 * @property int $id
 * @property string $job_title
 * @property \Illuminate\Support\Carbon $graduation_date
 * @property \Illuminate\Support\Carbon $birth_of_date
 * @property string $address
 * @property int $years_of_experience
 * @property string|null $cv
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\MedicalBoard $medical_board
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employ onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereBirthOfDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereGraduationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereYearsOfExperience($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employ withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employ withoutTrashed()
 * @mixin \Eloquent
 */
class Employ extends Model
{
    use SoftDeletes;

    public $table = 'employs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'job_title',
        'graduation_date',
        'birth_of_date',
        'address',
        'years_of_experience',
        'cv'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'job_title' => 'string',
        'graduation_date' => 'date',
        'birth_of_date' => 'date',
        'address' => 'string',
        'years_of_experience' => 'integer',
        'cv' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'job_title' => 'required|max:150|min:3',
        'graduation_date' => 'required',
        'birth_of_date' => 'required',
        'address' => 'required|max:150|min:5',
        'years_of_experience' => 'required|min:1'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medical_board()
    {
        return $this->hasOne(MedicalBoard::class);
    }

}
