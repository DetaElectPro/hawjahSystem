<?php

namespace App\Http\Controllers\Api;

use App\Models\MedicalSpecialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalSpecialtyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MedicalSpecialty[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return MedicalSpecialty::with('medical')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        $medical_specialty = new MedicalSpecialty($request->all());
        return $medical_specialty->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MedicalSpecialty|\Illuminate\Database\Eloquent\Builder
     */
    public function show($id)
    {
        return MedicalSpecialty::whereId($id)->with('medical');
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
