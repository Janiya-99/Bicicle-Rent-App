<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function logout()
    {
        $user = Auth::user();

        $user->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
