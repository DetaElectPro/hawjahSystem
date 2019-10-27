<?php

namespace App\Http\Controllers\Api;

use App\Models\Auth\Role\Role;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use JWTAuth;
use Illuminate\Http\Request;
use App\Models\Auth\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Events\Registered;
use Illuminate\Support\Facades\Auth;


class AuthControllerApi extends Controller
{
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
            'image' => $image,
        ]);
        // attach role
        $role = Role::where('name', $request->role)->first();
        $user->roles()->attach($role);

        event(new Registered($user, $request->role));

        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }

//    public function login(Request $request)
//    {
//        $credentials = request(['phone', 'password']);
//
//        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
//            if (!Auth::user()->hasRole($request->role) && !$token = auth('api')->attempt($credentials)) {
//                return response()->json(["error" => "Permission denied. No suitable role found", 'api'=> 'Unauthorized'], 401);
//            }
//            $token = auth('api')->attempt($credentials);
//            return $this->respondWithToken($token);
//
//        }
//        return response()->json(["error" => "Invalid Login"], 400);
//    }

    public function login()
    {
        try {
            $credentials = request(['phone', 'password']);

            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token);
        } catch (\Exception $exception) {
            return response()->json([
                'error line' => $exception->getLine(),
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([

            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 31556926,
            'user' => auth('api')->user()
        ]);
    }

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

    public function profile()
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

    public function profileById($id)
    {
        return User::whereId($id)->with('employ', 'medical_board')->get(['id', 'name', 'phone', 'created_at']);
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

    /**
     * @return string
     */
    public function dateNow()
    {
        $mytime = Carbon::now();
        return $mytime->toDateTimeString();
    }
}