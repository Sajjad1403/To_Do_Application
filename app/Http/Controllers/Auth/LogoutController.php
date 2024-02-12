<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
    $token = $request->header('Authorization');

    if ($token) {
        JWTAuth::invalidate($token);
        return response()->json(['message' => 'User successfully signed out', 'status' => 200], 200);
    }

    return response()->json(['message' => 'Token not provided', 'status' => 400], 400);
    }
}
