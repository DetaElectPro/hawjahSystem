<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Str;

class LoginByPhoneController extends Controller
{
    public function showLoginForm()
    {
        $auth = 1;
        return view('auth.login', compact('auth'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = Auth::attempt($credentials);
        // Authentication passed...
        if ($user) {
            Redirect::route('home.index');
        }
        return "error";

    }

}
