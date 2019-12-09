<?php

namespace App\Http\Controllers\Api;

use App\Models\AcceptRequest;
use App\Models\RequestSpecialist;
use App\Notifications\RequestSpecialistNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Notification;

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
        return AcceptRequest::whereUserId($user)->with('user', 'requestSpecialist')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = auth('api')->user();
        $acceptRequest = new AcceptRequest();
        $acceptRequest = $acceptRequest->acceptRequest($request, $user);
        return $acceptRequest;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return AcceptRequest[]|Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {
        return AcceptRequest::whereId($id)->with('requestSpecialist', 'user')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
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
        return AcceptRequest::destroy($id);
    }

    /**
     * @param Request $request
     * @return array|string
     * @throws \Exception
     */
    public function userAccept(Request $request)
    {

        $details = '';
        $user = auth('api')->user()->id;
        $acceptRequest = new RequestSpecialist();

        switch ($request->status) {
            case (2):
                return $acceptRequest->acceptRequestByUser($request->id, $user);
                break;
            case (3):
                return $acceptRequest->acceptRequestByAdmin($request->id);
                break;
            case (4):
                return $acceptRequest->cancelRequestByAdmin($request->id);
                break;
            case (5):
                return $acceptRequest->cancelRequestByUser($request->id);
                break;
            case (6):
                return $acceptRequest->acceptRequestAndDone($request->id, $request);
                break;
            default:
                return response()->json(['error' => true, 'message' => 'the: ' . $request->status . ' is note accept']);
        }
    }
}
