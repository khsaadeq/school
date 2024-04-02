<?php
 namespace App\Http\Controllers\Api;

use auth;
use App\Models\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//
class ApiParantsLogen extends Controller
{    public function __construct() {
        $this->middleware('auth:api', ['except' => ['loginParant']]);
    }
    public function loginParant(Request $request){
        $validator=validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->guard('Parant')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    public function logout() {
        auth()->guard('Parant')->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    public function refresh() {
        return $this->createNewToken(auth()->guard('Parant')->refresh());
    }

    public function userProfile() {
        return response()->json(auth()->guard('Parant')->user());
    }
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('Parant')->factory()->getTTL() * 60,
            'user' => auth()->guard('Parant')->user()
        ]);
        return [
            'token'=> auth()->guard('Parant')->createToken('web')->plainTextToken
        ];
    }
}
