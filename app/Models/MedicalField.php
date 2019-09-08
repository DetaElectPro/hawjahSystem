<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


/**
 * @SWG\Definition(
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
