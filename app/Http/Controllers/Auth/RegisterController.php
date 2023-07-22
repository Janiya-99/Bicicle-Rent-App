<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterationRequest;

class RegisterController extends Controller
{
    public function register(RegisterationRequest $request)
    {
        $newUser = $request->validated();

        $newUser['password'] = Hash::make($newUser['password']);

        $user = User::create($newUser);

        $token = $user->createToken('user', ['app:all'])->plainTextToken;
        return response()->json([
            'token' => $token,
            'success' => true,
        ]);

        return response()->json($token, 200);
    }
}
