<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Illuminate\Http\Request;
use App\Models\Auth\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthControllerApi extends Controller
{
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
            return response()->json(["message"=> $validator->messages()->first(), "error"=> true]);
        }
        $user = User::create([
            'phone' => $request->phone,
            'name' => $request->name,
            'role_id' => $request->role_id,
            'status' => $status,
            'password' => $request->password,
        ]);

        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }


    public function login()
    {
        $credentials = request(['phone', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
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
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(["message" => "token is expired", 'status' => false]);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(["message" => "token is invalid", 'status' => false]);
            // do whatever you want to do if a token is invalid

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(["message" => "token is not present", 'status' => false]);
            // do whatever you want to do if a token is not present
        }
    }

    public function profile()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return $data = User::whereId($user->id)->with('employ', 'medical_board')->get(['id', 'name', 'phone', 'created_at']);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(["message" => "token is expired", 'status' => false]);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(["message" => "token is invalid", 'status' => false]);
            // do whatever you want to do if a token is invalid

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(["message" => "token is not present", 'status' => false]);
            // do whatever you want to do if a token is not present
        }
    }

    public function profileById($id)
    {
        return User::whereId($id)->with('employ', 'medical_board')->get(['id', 'name', 'phone', 'created_at']);
    }

}