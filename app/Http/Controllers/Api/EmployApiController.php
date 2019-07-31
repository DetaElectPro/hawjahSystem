<?php

namespace App\Http\Controllers\Api;

use App\Models\Employ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use JWTAuth;

class EmployApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Employ[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        $employ = Employ::with('medical_board', 'user')->get();
        if (isset($employ)) {
            return $employ;
        } else {
            return response()->json(["error" => "no data found"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Employ|array
     */
    public function store(Request $request)
    {
        $user = auth('api')->user()->id;
        $cvFile = $this->saveFile($request, $user);

        $employ = new Employ($request->all());
        $employ->cv = $cvFile;
        $employ->user_id = $user;
        $employ->save();
        $userStatus = $employ->user()->update(['status'=> 2]);

        if (isset($employ)) {
            return [$employ, 'statusUpdate'=>$userStatus, 'status'=>2];
        } else {
            return response()->json(["error" => "no data found", $employ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Employ|Employ[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $employ = Employ::whereId($id)->with('medical_board', 'user')->get();
        if (isset($employ)) {
            return $employ;
        } else {
            return response()->json(["error" => "no data found"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response|int
     */
    public function destroy($id)
    {
        $employ = Employ::destroy($id);
        if (isset($employ)) {
            return $employ;
        } else {
            return response()->json(["error" => "no data found"]);
        }
    }

    /**
     * @param $request
     * @return bool|string
     */
    public function saveFile($request, $userId)
    {
        $random = Str::random(10);
        if ($request->hasfile('cv')) {
            $image = $request->file('cv');
            $name = $random . 'cv_' . $userId . ".pdf";
            $image->move(public_path() . '/cv/', $name);
            return $name;
        }
        return false;
    }
}
