<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $user->tokens()->delete();

            $token = $user->createToken($request->userAgent())->plainTextToken;

            return response()->json([
                'token' => $token,
                'success' => true,
            ]);
        } else {

            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }
    }
}