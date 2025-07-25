<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use \Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
  public function login(LoginRequest $request)
  {
    $credentials = $request->only('email', 'password');
    $token = JWTAuth::attempt($credentials);

    if (!$token) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }
    return response()->json(['success' => true, 'token' => $token, "expirest_in" => config("jwt.ttl") * 60]);
  }
  public function refresh()
  {
    $token = JWTAuth::getToken();
    $new_token = JWTAuth::refresh($token);
    if (!$token) {
      return response()->json(['error' => 'unAuthorized'], 401);
    }
    return response()->json([
      'access_token' => $new_token,
      'token_type' => 'bearer',
      'expires_in' => config('jwt.ttl') * 60
    ]);
  }

  public function logout()
  {
    try {
      $token = JWTAuth::getToken();
      if (!$token) {
        return response()->json(['error' => 'Token not provided'], 400);
      }
      JWTAuth::invalidate($token);
      return response()->json(['message' => 'Successfully logged out']);
    } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
      return response()->json(['error' => 'Failed to logout, please try again'], 500);
    }
  }

  public function me()
  {

    $user = auth('api')->user();
    if (!$user) {
      return response()->json(['error' => 'Unauthenticated'], 401);
    }
    return response()->json($user);
  }

}
