<?php

namespace App\Http\Controllers\Api;

use App\Models\MedicalBoard;
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
     * @return MedicalBoard
     */
    public function store(Request $request)
    {
        $user = auth('api')->user()->id;
        $medical = new MedicalBoard($request->all());
        $medical->user_id = $user;
        $medical->save();

        if (isset($medical)) {
            return $medical;
        } else {
            return response()->json(["error" => "no data found", $medical]);
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
