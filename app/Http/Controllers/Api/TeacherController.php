<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;

use App\Models\identity;
use App\Models\Teacher;
use App\Models\User;
// use App\Models\nationality;
use App\Models\Qualification_study;
use Illuminate\Http\Request;
use App\Http\Resources\TeacherResources;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\TeacherRequest;

class TeacherController extends Controller
{
    // use ApiResponseTrait;
    public function index()
    {
     $Teachers=Teacher::
     join('qualification_studies','qualification_studies.id', '=', 'teachers.qualification_study_id')
       -> where('job_id','=','2')
     ->get(['teachers.*','qualification_studies.name as qualification_studies_name']);
        return $Teachers;
    }
    public function emp_index()
    {
     $Teachers=Teacher::
      join('jobs','jobs.id', '=', 'teachers.job_id')
      ->where('job_id','!=','2')
     ->get(['teachers.*','jobs.name as job_name']);
        return $Teachers;
    }
    public function all_emp_index()
    {
     $Teachers=Teacher::
      join('jobs','jobs.id', '=', 'teachers.job_id')
     ->get(['teachers.*','jobs.name as job_name']);
        return $Teachers;
    }


    public function create(Request $request)
    {
        $validator=validator::make($request->all(),[
            'name'=>'required|varchar|max:255',]);
            if($validator->fails()){
                return $this->apiResponse(null, $validator->errors(),status:400);
            } $users=new User();

            $users=new identity();
        $users=new Qualification_study();
        $users->type_users=$request->input('type_users');
             $users->save();
             if($users){
                return $this->apiResponse($users, message:"bbbnnnnn" ,status:201);

                }
                return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);


//  return response()->json($users);

    }
    public function store(TeacherRequest $request)
    {
        $teach = Teacher::create(
            array_merge(
                $request->validated(), [
                    'password' => bcrypt($request->password),

                ] ));

        if($teach){return response()->json([
                'message' => 'Teachers successfully registered','Teachers' => $teach, ], 201);}
            return response()->json([
            'message' => 'Teachers not successfully registered','Teachers' => null], 400);
    }

    public function show()
    {
        $Teachers=TeacherResources::collection(Teacher::with('identity',
        'nationality','qualification_study','job')->get());
        return response()->json([ 'message' => 'Teachers not id successfully registered',
        'Teachers' => $Teachers, ], 201);
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        //
    }
    //
    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, $id) {

        $Teachers = Teacher::find($id);
        if(!$Teachers){
            return response()->json([
                'message' => 'Teachers not id successfully registered',
                'Teachers' => $Teachers
            ], 201);
                }

        $Teachers->update(   $request->validated(), [
            'password' => bcrypt($request->password),]
        );
            if($Teachers){return response()->json([
                'message' => 'Teachers successfully registered',
                'Teachers' => $Teachers
            ], 201);}
       else{ return response()->json([
            'message' => 'Teachers not successfully registered',
            'Teachers' => $Teachers
        ], 400);}
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Teachers = Teacher::find($id);
        if(!$Teachers){
            return response()->json([
                'message' => 'Teachers not id successfully registered',
                'Teachers' => $Teachers
            ], 201);
                }

        $Teachers->delete($id);
            if($Teachers){return response()->json([
                'message' => 'Teachers successfully registered',
                'Teachers' => $Teachers
            ], 201);}
        return response()->json([
            'message' => 'Teachers not successfully registered',
            'Teachers' => $Teachers
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $Teachers = Teacher::Truncate();;

            if($Teachers){return response()->json([
                'message' => 'Teachers successfully registered',
                'Teachers' => $Teachers
            ], 201);}
        return response()->json([
            'message' => 'Teachers not successfully registered',
            'Teachers' => $Teachers
        ], 400);

    }
}
