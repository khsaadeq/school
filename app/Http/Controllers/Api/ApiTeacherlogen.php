<?php
 namespace App\Http\Controllers\Api;

use auth;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//
class ApiTeacherlogen extends Controller
{    public function __construct() {
        $this->middleware('auth:api', ['except' => ['logidn']]);
    }
    public function logidn(Request $request){
        $validator=validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->guard('Teacher')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);

    }

    public function logout() {
        auth()->guard('Teacher')->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    public function refresh() {
        return $this->createNewToken(auth()->guard('Teacher')->refresh());
    }

    public function userProfile() {
        return response()->json(auth()->guard('Teacher')->user());
    }
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('Teacher')->factory()->getTTL() * 60,
            'teachers' => auth()->guard('Teacher')->user()
        ]);
        return [
            'token'=> auth()->guard('Teacher')->createToken('web')->plainTextToken
        ];
    }
}
