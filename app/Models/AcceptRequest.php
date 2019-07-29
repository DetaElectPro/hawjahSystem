<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * App\Models\AcceptRequest
 *
 * @property int $id
 * @property string $notes
 * @property string|null $recommendation
 * @property int|null $rating
 * @property int $user_id
 * @property int $request_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\RequestSpecialist $requestSpecialist
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AcceptRequest whereUserId($value)
 * @mixin \Eloquent
 */
class AcceptRequest extends Model
{
    protected $fillable = ['notes', 'recommendation', 'rating', 'request_id', 'user_id'];

    public function user()
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
