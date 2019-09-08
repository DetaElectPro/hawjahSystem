<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable; 


/**
 * @SWG\Definition(
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
