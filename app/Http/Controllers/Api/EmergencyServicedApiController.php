<?php

namespace App\Http\Controllers\Api;

use App\Models\EmergencyServiced;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmergencyServicedApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EmergencyServiced[]|Collection
     */
    public function index()
    {
        return EmergencyServiced::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        $emergencyServcied = new EmergencyServiced($request->all());

        return $emergencyServcied->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return EmergencyServiced|EmergencyServiced[]|Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return EmergencyServiced::findOrFail($id);
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
        return EmergencyServiced::whereId($id)->update([$request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return int
     */
    public function destroy($id)
    {
        return EmergencyServiced::destroy($id);
    }
}
