<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ProfileRepository;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class ProfileApiController extends AppBaseController
{

    /** @var  ProfileRepository */
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return User[]|Builder[]|Collection
     */
    public function index()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return $data = User::whereId($user->id)->with('employ', 'medical_board')->get(['id', 'name', 'phone', 'created_at']);
        } catch (TokenExpiredException $e) {

            return response()->json(["message" => "token is expired", 'status' => false]);

        } catch (TokenInvalidException $e) {
            return response()->json(["message" => "token is invalid", 'status' => false]);
            // do whatever you want to do if a token is invalid

        } catch (JWTException $e) {
            return response()->json(["message" => "token is not present", 'status' => false]);
            // do whatever you want to do if a token is not present
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = $this->profileRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
