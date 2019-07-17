<?php

namespace App\Http\Controllers\Api;

use App\Models\Employ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class EmployApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Hi";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Employ
     */
    public function store(Request $request)
    {
        $user = auth('api')->user()->id;
        $employ = new Employ($request->all());
        $employ->user_id = $user;
        $employ->save();

        return $employ;

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
