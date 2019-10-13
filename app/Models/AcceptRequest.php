<?php

namespace App\Models;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\AcceptRequest
 *
 * @property int $id
 * @property string $notes
 * @property string|null $recommendation
 * @property int|null $rating
 * @property int $user_id
 * @property int $request_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read RequestSpecialist $requestSpecialist
 * @property-read User $user
 * @method static Builder|AcceptRequest newModelQuery()
 * @method static Builder|AcceptRequest newQuery()
 * @method static Builder|AcceptRequest query()
 * @method static Builder|AcceptRequest whereCreatedAt($value)
 * @method static Builder|AcceptRequest whereId($value)
 * @method static Builder|AcceptRequest whereNotes($value)
 * @method static Builder|AcceptRequest whereRating($value)
 * @method static Builder|AcceptRequest whereRecommendation($value)
 * @method static Builder|AcceptRequest whereRequestId($value)
 * @method static Builder|AcceptRequest whereUpdatedAt($value)
 * @method static Builder|AcceptRequest whereUserId($value)
 * @mixin Eloquent
 */
class AcceptRequest extends Model
{
    protected $fillable = ['notes', 'recommendation', 'rating', 'request_id', 'user_id'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


//    public function admin()
//    {
//        return '';
//    }


    public function requestSpecialist()
    {
        return $this->belongsTo(RequestSpecialist::class, 'request_id');
    }

    public function acceptRequest($request, $user)
    {
//        $requestSpecialist = DB::select('select * from request_specialists where( id ==? AND  status=?)', [$request_id, 1]);
        $accept = new AcceptRequest($request->all());
        $accept->user_id = $user;
        $accept = $accept->save();
        $requestUpdate = RequestSpecialist::whereId($request->request_id)->update(['status' => 3]);
        $data = [$accept, $requestUpdate];
        return $data;


    }
}
