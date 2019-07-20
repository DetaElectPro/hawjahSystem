<?php

namespace App\Http\Controllers\Api;

use App\Models\RequestSpecialist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestSpecialistApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RequestSpecialist[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return RequestSpecialist::with('specialties', 'user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RequestSpecialist
     */
    public function store(Request $request)
    {
        $user = auth('api')->user()->id;
        $request_specialist = new RequestSpecialist($request->all());
        $request_specialist->user_id = $user;
        $request_specialist->save();
        return $request_specialist;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
