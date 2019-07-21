<?php

namespace App\Http\Controllers\Api;

use App\Models\MedicalField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalFieldApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MedicalField[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return MedicalField::with('specialty')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return MedicalField
     */
    public function store(Request $request)
    {
        $medical_field = new MedicalField($request->all());
        $medical_field->save();
        return $medical_field;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MedicalField|\Illuminate\Database\Eloquent\Builder
     */
    public function show($id)
    {
       return $medical_field = MedicalField::whereId($id)->with('specialty');
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
