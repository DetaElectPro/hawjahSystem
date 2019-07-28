<?php

namespace App\Http\Controllers\Api;

use App\Models\AcceptRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class AcceptRequestApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AcceptRequest[]|Builder[]|\Illuminate\Database\Eloquent\Collection|Collection
     */
    public function index()
    {
        $user = auth('api')->user()->id;
        return AcceptRequest::where('user_id', $user)->with('user', 'requestSpecialist')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
