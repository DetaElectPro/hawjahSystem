<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use DB;

class AcceptRequest extends Model
{
    protected $fillable = ['notes', 'recommendation', 'rating', 'request_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function admin()
    {
        return '';
    }


    public function requestSpecialist()
    {
        return $this->belongsTo(RequestSpecialist::class, 'request_id');
    }

    public function acceptRequest($request, $user, $request_id)
    {
        $requestSpecialist = DB::select('select * from request_specialists where( id ==? AND  status=?)', [$request_id, 1]);
//        if ()
        $accept = new AcceptRequest($request->all());
        $accept->user_id = $user;
        $accept->save();
    }
}
