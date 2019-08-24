<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Models\RequestSpecialist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class  RequestSpecialistApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return RequestSpecialist[]|Builder[]|Collection
     */
    public function index()
    {
        return RequestSpecialist::with('specialties.medical', 'user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public function store(Request $request)
    {
        $user = auth('api')->user()->id;
        $request_specialist = new RequestSpecialist($request->all());
        $request_specialist->user_id = $user;
         $request_specialist = $request_specialist->save();
        return $this->sendResponse($request_specialist, 'Request Specialties retrieved successfully');

    }

    /**
     * Display the specified resource.
     * accept
     * @param int $id
     * @return RequestSpecialist[]|Builder[]|Collection
     */
    public function show($id)
    {
        return $request_specialist = RequestSpecialist::whereId($id)
            ->with('specialties.medical', 'user')
            ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return bool|int
     */
    public function update(Request $request, $id)
    {
        $user = auth('api')->user()->id;
        $request->request->add(['user_id', $user]);
        $request_specialist = RequestSpecialist::whereId($id)
            ->update($request->all());
        return $request_specialist;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return int
     */
    public function destroy($id)
    {
        return $request_specialist = RequestSpecialist::destroy($id);
    }

}
