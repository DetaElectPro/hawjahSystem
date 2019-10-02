<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ProfileRepository;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
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
            return $data = User::whereId($user->id)->with('employ', 'medical_board')->first(['id', 'name', 'phone', 'image', 'created_at']);
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

    public function store(Request $request)
    {
        $inpute = $request->all();
        try {
            $user = auth('api')->user()->id;
            if ($request->hasFile('image')) {
                $file_name = $this->saveFile($request, $user);
                $profile = User::findOrFail($user);
                $profile->fill($request->all());
                $profile->image = $file_name;
                $profile->save();
                return response()->json(['profile' => $profile, 'type'=>'request']);
            }
            if ($request->image){
                $file_name = $this->saveBase64($request, $user);
                $profile = User::findOrFail($user);
                $profile->fill($request->all());
                $profile->image = $file_name;
                $profile->save();
                return response()->json(['profile' => $profile, 'type'=>'base64']);
            }
            else {
                $profile = $this->profileRepository->update($inpute, $user);
                return response()->json(['profile' => $profile, 'type'=>'no image']);
            }

        } catch (\Exception $exception) {
            return response()->json(["message" => $exception->getMessage(), 'status' => false]);
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
//    public function update(Request $request, $id)
//    {
//        $input = $request->all();

//        /** @var User $user */
//        $user = $this->profileRepository->find($id);
//
//        if (empty($user)) {
//            return $this->sendError('User Profile not found');
//        }
//
//        $user = $this->profileRepository->update($input, $id);
//
//        return $this->sendResponse($user->toArray(), 'User Profile updated successfully');
//    }

    /**
     * @param Request $request
     * @return User|bool|\Illuminate\Database\Query\Builder|\Illuminate\Http\JsonResponse|int
     */
//    public function update(Request $request, $id)
//    {
//        $inpute = $request->all();
//        try {
//            $user = auth('api')->user()->id;
//            if ($request->hasFile('image')) {
//                $file_name = $this->saveFile($request, $user);
//                $profile = User::whereId($user);
//                $profile->image = $file_name;
//                $profile->save($request->all());
//                return response()->json(['profile' => $profile]);
//            } else {
//                $profile = $this->profileRepository->update($inpute, $user);
//                return response()->json(['profile' => $profile]);
//            }
//
//        } catch (\Exception $exception) {
//            return response()->json(["message" => "$exception", 'status' => false]);
//        }
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     *
     * public function destroy($id)
     * {
     * /** @var User $user
     * $user = $this->profileRepository->find($id);
     *
     * if (empty($user)) {
     * return $this->sendError('User not found');
     * }
     *
     * $user->delete();
     *
     * return $this->sendResponse($id, 'User Profile deleted successfully');
     * }
     */


    public function saveFile($request, $userId)
    {
        $random = Str::random(10);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $random . 'image_' . $userId . ".jpg";
            $image->move(public_path() . '/profiles/', $name);
            $name = url("profiles/$name");

            return $name;
        }
        return false;
    }

    public function saveBase64($request, $userId)
    {
        $image = $request->image;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str::random(10).'.'.'jpg';

        \File::put(public_path().'/profiles/u_id-'.$userId.$imageName, base64_decode($image));
        $imageName = url("profiles/u_id-$userId$imageName");
        return $imageName;
    }
}
