<?php

namespace App;

use App\Models\{AcceptRequestSpecialists, Wallet, EmergencyServiced, Employ};
use Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string|null $fcm_registration_id
 * @property string|null $image
 * @property string $password
 * @property int $active
 * @property string|null $confirmation_code
 * @property int $confirmed
 * @property Carbon|null $email_verified_at
 * @property int $status
 * @property int $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property-read AcceptRequestSpecialists|null $acceptRequest
 * @property-read Collection|EmergencyServiced[] $emergency
 * @property-read int|null $emergency_count
 * @property-read Employ|null $employ
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereActive($value)
 * @method static Builder|User whereConfirmationCode($value)
 * @method static Builder|User whereConfirmed($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFcmRegistrationId($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereImage($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRole($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'created_at', 'image', 'role', 'status', 'fcm_registration_id'
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
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'role' => 'integer',
        'status' => 'integer',
        'fcm_registration_id' => 'string',
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

//    public function setPasswordAttribute($password)
//    {
//        if (!empty($password)) {
////            $this->attributes['password'] = app('hash')->make($password);
//            $this->attributes['password'] = app('hash')->make($password);
//        }
//    }

    public function createWallet()
    {
        $user = Auth::user()->id;
        $wallet = new Wallet();
        $wallet->balance = env('BALANCE');
        $wallet->user_id = $user;
        $wallet->save();
        return $wallet;
    }

    public function employ()
    {
        return $this->hasOne(Employ::class);
    }

    public function emergency()
    {
        return $this->hasMany(EmergencyServiced::class, 'user_id');
    }

    public function acceptRequest()
    {
        return $this->hasOne(AcceptRequestSpecialists::class);
    }

    /**
     * Determine if the entity has a given ability.
     *
     * @param string $ability
     * @param array|mixed $arguments
     * @return bool
     */
    public function can($ability, $arguments = [])
    {
        // TODO: Implement can() method.
    }
}
