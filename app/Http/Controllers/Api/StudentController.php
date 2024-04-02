<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Models\student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\studentResources;
use App\Http\Requests\Auth\StudenRequest;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        $parents = student::
              join('nationality', 'nationality.id', '=', 'students.nationality_id')
            ->join('quran_episodes', 'quran_episodes.id', '=', 'students.quran_episod_id')
            ->join('parents', 'parents.id', '=', 'students.guardian_id')
            ->join('identities', 'identities.id', '=', 'students.identity_id')
            ->get(['students.*', 'nationality.name as nationality_name', 'quran_episodes.name as school_name', 'parents.name as parent_name','identities.type_identity as identity_name']);
        return $parents;
    }
    public function index_flutter($parent_id)
    {
        $parents = student::
            where('guardian_id','=',$parent_id)
           -> get(['students.id', 'students.name']);
        return $parents;
    }
    public function numberOfStudent()
    {

    }
    public function store(StudenRequest $request)
    {
        // $imageName =  $request-> image -> getClientOriginalExtension();
        // $nameee=time().'.'.$imageName;
        // $path='imagesfp';
        // $request->image->move($path,$nameee);
        // $users=User ::where('active', 1)->max('id');
        $students = student::create(array_merge(
            $request->validated(),
            [
                // 'image' =>$nameee,
                'password' => bcrypt($request->password)
            ]
        ));
        if ($students) {
            return response()->json([
                'message' => 'students successfully registered',
                'students' => $students
            ], 201);
        } else {
            return response()->json([
                'message' => 'students nut successfully registered',
                'students' => null
            ], 400);
        }
    }
    public function show()
    {
        $students = studentResources::collection(student::with(
            'identity',
            'gender',
            'nationality',
            'Paran',
            'quran_episod',
        )->get());
        return response()->json([
            'message' => 'guardian not id successfully registered',
            'guardian' => $students,
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudenRequest $request, $id)
    {

        $students = student::find($id);
        if (!$students) {
            return response()->json([
                'message' => 'students notggggg id successfully registered',
                'students' => $students
            ], 201);
        }
        $students->update(array_merge(
            $request->validated(),
            [
                // 'identity_id'=>$request->identity_id,
                // 'nationality_id'=>$request->nationality_id,
                // 'guardian_id'=>$request->guardian_id,
                // 'quran_episodes_id'=>$request->quran_episodes_id,
                // 'users_id'=>$request->users_id,
            ]
        ));
        if ($students) {
            return response()->json([
                'message' => 'students successfully registered',
                'students' => $students
            ], 201);
        } else {
            return response()->json([
                'message' => 'students not successfully registered',
                'students' => $students
            ], 400);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = student::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not id successfully registered',
                'user' => $user
            ], 201);
        }

        $user->delete($id);
        if ($user) {
            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);
        }
        return response()->json([
            'message' => 'User not successfully registered',
            'user' => $user
        ], 400);
    }
    public function deleteTruncate(string $id)
    {
        $user = student::Truncate();;

        if ($user) {
            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);
        }
        return response()->json([
            'message' => 'User not successfully registered',
            'user' => $user
        ], 400);
    }
}
