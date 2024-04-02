<?php
 namespace App\Http\Controllers\Api;

use auth;
use App\Models\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//
class ApiStudentlogen extends Controller
{    public function __construct() {
        $this->middleware('auth:api', ['except' => ['logein']]);
    }
    public function logein(Request $request){
        $validator=validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->guard('student')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    public function logout() {
        auth()->guard('student')->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    public function refresh() {
        return $this->createNewToken(auth()->guard('student')->refresh());
    }

    public function userProfile() {
        return response()->json(auth()->guard('student')->user());
    }
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('student')->factory()->getTTL() * 60,
            'user' => auth()->guard('student')
        ]);
        return [
            'token'=> auth()->guard('student')->createToken('web')->plainTextToken
        ];
    }
}
