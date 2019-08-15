<?php

namespace App\Http\Controllers\Api;

use App\Models\EmergencyServices;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmergencyServicedApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EmergencyServices[]|Collection
     */
    public function index()
    {
        return EmergencyServices::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        $emergencyServcied = new EmergencyServices($request->all());

        return $emergencyServcied->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return EmergencyServices|EmergencyServices[]|Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return EmergencyServices::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return bool|int
     */
    public function update(Request $request, $id)
    {
        return EmergencyServices::whereId($id)->update([$request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return int
     */
    public function destroy($id)
    {
        return EmergencyServices::destroy($id);
    }
}
