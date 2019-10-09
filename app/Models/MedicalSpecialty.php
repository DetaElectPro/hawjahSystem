<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable; 


/**
 * App\Models\MedicalSpecialty
 *
 * @SWG\Definition (
 *      definition="MedicalSpecialty",
 *      required={"medical_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="medical_id",
 *          description="medical_id",
 *          type="integer",
 *          format="int32"
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
 * @property string $name
 * @property int $medical_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\MedicalField $medical
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalSpecialty onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereMedicalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalSpecialty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalSpecialty withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalSpecialty withoutTrashed()
 * @mixin \Eloquent
 */
class MedicalSpecialty extends Model
{
    use SoftDeletes, Sortable;

    public $table = 'medical_specialties';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'medical_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'medical_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:100|min|3',
        'medical_id' => 'max:100|min:3'
    ];

    public function medical()
    {
        return $this->belongsTo(MedicalField::class);
    }

//  public function specialties()
//    {
//        return $this->hasMany(MedicalSpecialty::class, 'medical_id');
//    }

}
