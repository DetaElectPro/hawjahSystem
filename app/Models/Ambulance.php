<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Ambulance
 * @package App\Models
 * @version December 9, 2019, 9:14 pm UTC
 *
 * @property users user
 * @property string title
 * @property string address
 * @property string longitude
 * @property string latitude
 * @property integer user_id
 */
class Ambulance extends Model
{
    use SoftDeletes, Sortable;

    public $table = 'ambulances';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'address',
        'longitude',
        'latitude',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'address' => 'string',
        'longitude' => 'string',
        'latitude' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'address' => 'required',
    ];

    /**
     * @return BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
