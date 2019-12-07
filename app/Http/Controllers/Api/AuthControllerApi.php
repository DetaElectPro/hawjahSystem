<?php

namespace App\Http\Controllers\Api;

use App\Models\Auth\Role\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use App\Events\Registered;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class AuthControllerApi extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;


    public function login(Request $request)
    {
        $input = $request->only('phone', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Phone or Password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token_type' => 'bearer',
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL(),
            'user' => JWTAuth::user(),
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {

//        try {
        JWTAuth::invalidate($request->token);
        JWTAuth::invalidate();

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully'
        ]);
//        } catch (JWTException $exception) {
//            dd($exception);
//            return response()->json([
//                'success' => false,
//                'exception' => $exception->getFile(),
//                'exception1' => $exception->getLine(),
//                'exception2' => $exception->getMessage(),
//                'message' => 'Sorry, the user cannot be logged out'
//            ], 500);
//        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $status = 1;
        $validator = Validator::make($request->all(), [
            'email' => 'email|unique:users',
            'name' => 'required|max:255',
            'phone' => 'required|unique:users|max:10',
            'password' => 'required|max:30|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json(["message" => $validator->messages()->first(), "error" => true]);
        }
        $image = self::saveImage($request);
        $user = User::create([
            'phone' => $request->phone,
            'name' => $request->name,
            'role_id' => $request->role_id,
            'status' => $status,
            'password' => $request->password,
            'image' => $image
        ]);
        // attach role
        $role = Role::where('name', $request->role)->first();
        $user->roles()->attach($role);

        event(new Registered($user, $request->role));


        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    /**
     * @return JsonResponse
     */
    public function checkAuth()
    {
        try {
            $token = JWTAuth::parseToken()->authenticate();
            return response()->json(["message" => "valid token", "status" => true]);
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


    public function saveImage($request)
    {
        $random = Str::random(10);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = $random . 'profile_' . self::dateNow() . ".jpg";
            $image->move(public_path() . '/upload/image/', $name);
            $name = url("upload/image/$name");
            return $name;
        }
        return url("upload/image/profile.jpg");
    }
}




/**
 * @param Request $request
 * @return JsonResponse
 */
//    public function register(Request $request)
//    {
//        $status = 1;
//        $validator = Validator::make($request->all(), [
//            'email' => 'email|unique:users',
//            'name' => 'required|max:255',
//            'phone' => 'required|unique:users|max:10',
//            'password' => 'required|max:30|min:6'
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(["message" => $validator->messages()->first(), "error" => true]);
//        }
//        $image = self::saveImage($request);
//
//        $user = User::create([
//            'phone' => $request->phone,
//            'name' => $request->name,
//            'role_id' => $request->role_id,
//            'status' => $status,
//            'password' => $request->password,
//            'image' => $image,
//        ]);
//        // attach role
//        $role = Role::where('name', $request->role)->first();
//        $user->roles()->attach($role);
//
//        event(new Registered($user, $request->role));
//
//        $token = auth('api')->login($user);
//
//        return $this->respondWithToken($token);
//    }


//    public function saveImage($request)
//    {
//        $random = Str::random(10);
//        if ($request->hasfile('image')) {
//            $image = $request->file('image');
//            $name = $random . 'profile_' . self::dateNow() . ".jpg";
//            $image->move(public_path() . '/upload/image/', $name);
//            $name = url("upload/image/$name");
//            return $name;
//        }
//        return url("upload/image/profile.jpg");
//    }

/**
 * @return string
 */
//    public function dateNow()
//    {
//        $mytime = Carbon::now();
//        return $mytime->toDateTimeString();
//    }
