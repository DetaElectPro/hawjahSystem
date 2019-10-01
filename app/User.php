<?php

namespace App;

use App\Models\AcceptRequest;
use App\Models\Auth\Role\Role;
use App\Models\Auth\User\Traits\Ables\Protectable;
use App\Models\Auth\User\Traits\Attributes\UserAttributes;
use App\Models\EmergencyServiced;
use App\Models\MedicalBoard;
use App\Models\Protection\ProtectionShopToken;
use App\Models\Protection\ProtectionValidation;
use Carbon\Carbon;
// use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Auth\User\Traits\Ables\Rolable;
use App\Models\Auth\User\Traits\Scopes\UserScopes;
use App\Models\Auth\User\Traits\Relations\UserRelations;
use Kyslik\ColumnSortable\Sortable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\Auth\User\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property bool $active
 * @property string $confirmation_code
 * @property bool $confirmed
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read mixed $avatar
 * @property-read mixed $licensee_name
 * @property-read mixed $licensee_number
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read Collection|ProtectionShopToken[] $protectionShopTokens
 * @property-read ProtectionValidation $protectionValidation
 * @property-read Collection|SocialAccount[] $providers
 * @property-read Collection|Role[] $roles
 * @method static Builder|User sortable($defaultSortParameters = null)
 * @method static Builder|User whereActive($value)
 * @method static Builder|User whereConfirmationCode($value)
 * @method static Builder|User whereConfirmed($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRole($role)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */

class User extends Authenticatable implements JWTSubject
{


    use Rolable, 
        UserAttributes,
        UserScopes,
        UserRelations,
        Notifiable,
        SoftDeletes,
        Sortable,
        Protectable;

    public $sortable = ['name', 'email', 'created_at', 'updated_at', 'image'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'status', 'player_id', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }


//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = \Hash::make($password);
//    }



    public function employ()
    {
        return $this->hasOne('App\Models\Employ');
    }

    public function medical_board()
    {
        return $this->hasOne(MedicalBoard::class);
    }

    public function acceptRequest()
    {
        return $this->hasOne(AcceptRequest::class);
    }

    public function emergencyServices()
    {
        return $this->hasMany(EmergencyServiced::class);
    }

    /**
     * Relation with role
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    protected $dates = ['deleted_at'];
}
