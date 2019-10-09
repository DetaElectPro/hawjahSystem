<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable; 


/**
 * App\Models\MedicalField
 *
 * @SWG\Definition (
 *      definition="MedicalField",
 *      required={"name"},
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
 *      ),
 *      @SWG\Property(
 *          property="medical",
 *          description="medical object for MedicalSpecialty",
 *          type="object",
 *          format="string|integer|date-time",
 *        @SWG\Property(
 *          property="name",
 *          description="name of Specialty",
 *          type="string",
 *      ), @SWG\Property(
 *          property="medical_id",
 *          description="id of Medical Field",
 *         type="integer",
 *         format="int32"
 *      ), @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      )
 *      )
 * )
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MedicalSpecialty[] $medical
 * @property-read int|null $medical_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalField withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalField withoutTrashed()
 * @mixin \Eloquent
 */
class MedicalField extends Model
{
    use SoftDeletes, Sortable;

    public $table = 'medical_fields';


    protected $dates = ['deleted_at'];

    public $sortable = ['name', 'created_at', 'updated_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3'
    ];

    public function medical()
    {
        return $this->hasMany(MedicalSpecialty::class, 'medical_id');
    }
}
