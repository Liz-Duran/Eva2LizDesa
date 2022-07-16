<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if(Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }
}
