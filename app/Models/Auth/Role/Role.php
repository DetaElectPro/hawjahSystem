<?php

namespace App\Models\Auth\Role;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Role\Traits\Scopes\RoleScopes;
use App\Models\Auth\Role\Traits\Relations\RoleRelations;

/**
 * App\Models\Auth\Role\Role
 *
 * @property int $id
 * @property string $name
 * @property int $weight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\Role\Role sort($direction = 'asc')
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\Role\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\Role\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\Role\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\Role\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\Role\Role whereWeight($value)
 * @mixin \Eloquent
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role\Role query()
 */
class Role extends Model
{
    use RoleScopes,
        RoleRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    
}
