<?php

namespace App\Http\Controllers\Api;

use App\Models\Employ;
use App\Models\MedicalBoard;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalBoardApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MedicalBoard[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $medical = MedicalBoard::with('employ', 'user')->get();
        if (isset($medical)) {
            return $medical;
        } else {
            return response()->json(["error" => "no data found"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        try {
            $user = auth('api')->user()->id;
            $employ = Employ::whereUserId($user)->first('id');
            $medical = new MedicalBoard($request->all());
            $medical->user_id = $user;
            $medical->employ_id = $employ->id;
            $medical->save();
            $userStatus = $medical->user()->update(['status' => 3]);
//        $userStatus = User::whereId($user)->update(['status' => 3]);

            if (isset($medical)) {
                return ['data' => $medical, 'statusUpdate' => $userStatus, 'status' => 3];
            } else {
                return response()->json(["error" => "no data found", $medical]);
            }
        } catch (\Exception $exception) {
            return response()->json(["message" => "token is expired", 'status' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MedicalBoard[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {
        $medical = MedicalBoard::whereId($id)->with('medical_board', 'user')->get();
        if (isset($medical)) {
            return $medical;
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
     * @return int
     */
    public function destroy($id)
    {
        $medical = MedicalBoard::destroy($id);
        if (isset($medical)) {
            return $medical;
        } else {
            return response()->json(["error" => "no data found"]);
        }
    }
}
