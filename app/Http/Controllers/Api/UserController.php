<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Userreso;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UsersRequest;


class UserController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {  $users=User::get();
        return response()->json(['message' => 'User successfully registered','user' => $users], 200);
    }
    /*** Show the form for creating a new resource.*/
    // public function create(Request $request) { $users=gender::get();
    //     return response()->json(['message' => 'User successfully registered','user' => $users], 200);}
    /*** Store a newly created resource in storage.*/
    public function store(UsersRequest $request)
    {$user = User::create(array_merge($request->validated(),['password' => bcrypt($request->password),]));
        if($user){
            return response()->json(['message' => 'user_role successfully registered','user' => $user], 201);
        }
        else{ return response()->json([
            'message' => 'user_role not successfully registered','user' => null], 201);}
    }
    public function show(string $id)
    {
         $users=Userreso ::collection(user::with('students')->get());
        // return $this->apiResponse($users, message:"ko" ,status:200);
        // $users=Userreso ::collection(user::get());
        // return $this->apiResponse($users, message:"ko" ,status:200);
        $user = User::get($id);
        if($user){ return response()->json(['message' => 'User not id successfully registered',
                'user' => $user], 201);}
        // if($user){return response()->json(['message' => 'User not id successfully registered',
        //         'user' => $user], 201);}
    }
    public function edit(string $id) {
        $user = User::find($id);
        if(!$user){ return response()->json(['message' => 'User not id successfully registered',
                'user' => $user], 201);}
    }

    public function update(UsersRequest $request, $id) {
        $user = User::find($id);
        if(!$user){ return response()->json(['message' => 'User not id successfully registered',
                'user' => $user], 201);}
        $user->update($request->validated,['password' => bcrypt($request->password)]);
        if($user){   return response()->json([
            'message' => 'User successfully registered','user' => $user  ], 201);    }
        else{ return response()->json([
            'message' => 'User not successfully registered','user' => null], 401);}
    }
    public function destroy(string $id)
    { $user = User::find($id);
        if(!$user){ return response()->json(['message' => 'User not id successfully registered',
            'user' => $user], 201);}
        $user->delete($id);
        if($user){   return response()->json([
            'message' => 'User successfully registered','user' => $user  ], 201);    }
        else{ return response()->json([
            'message' => 'User not successfully registered','user' => null], 401);}
    }
    public function deleteTruncate(string $id)
    {
        $user = User::Truncate();;
        if($user){   return response()->json([
            'message' => 'User successfully registered','user' => $user  ], 201);    }
        else{ return response()->json([
            'message' => 'User not successfully registered','user' => null], 401);}
    }
}
