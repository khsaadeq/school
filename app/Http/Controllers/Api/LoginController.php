<?php

namespace App\Http\Controllers\Api;
use App\Models\teacher;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Traits\ATrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function chekGuard($request){

        if($request->type == 'student'){
            $guardName= 'student';
        }
        elseif ($request->type == 'guardian'){
            $guardName= 'guardian';
        }
        elseif ($request->type == 'teacher'){
            $guardName= 'teacher';
        }
        else{
            $guardName= 'api';
        }
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'student'){
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }
        elseif ($request->type == 'guardian'){
            return redirect()->intended(RouteServiceProvider::GUARDIAN);
        }
        elseif ($request->type == 'teacher'){
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    public function loginForm($type){

        // dd($type);
        return view('auth.login',compact('type'));
    }
    // public function logins(){

    //     return view('auth.logingggd');
    // }

    public function login(Request $request){

    //   return $request;
    $validator= validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }
    $teather =Teacher::where('email',$request->email)->first();
if($teather &&Hash::check($request->password,$teather->password)){
    $device_name=$request->post('device_name',$request->userAgent());
$token=$teather->createToken($device_name);
return response()->json([
    'message' => 'teacher successfully registered',
    'token'=>$token->plainTextToken,
    'user' => $user
], 201);
}

    return response()->json(['error' => 'Unauthorized'], 401);

        // if (Auth::guard($this->chekGuard($validator))) {
        //     return response()->json($validator->errors(), 422);
        // }
        // else{
        //     return response()->json(['message', 'يوجد خطا في كلمة المرور او اسم المستخدم']);
        // }

    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



}
