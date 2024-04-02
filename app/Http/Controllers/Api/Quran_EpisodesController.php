<?php

namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\teacher;
// use App\Http\Controllers\Api\quranepisodesResources;
use App\Models\system_episod;
use App\Models\quran_episodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\QuranEpisodesReques;
use App\Http\Resources\QuranEpsisadesResources;
use Illuminate\Support\Facades\DB;

class Quran_EpisodesController extends Controller
{
    // use ApiResponseTrait;
    // public function index()
    // {
    //     $quran_episod=quran_episodes::get();
    //     return response()->json([
    //         'message' => 'quran_episodes successfully registered',
    //         'quran_episodes' => $quran_episod
    //     ], 200);
    // }
   
    public function index(){
        $results=
        DB::table('quran_episodes')
         ->leftJoin('teachers', 'quran_episodes.teacher_id', '=', 'teachers.id')
        ->leftJoin('students', 'students.quran_episod_id', '=', 'quran_episodes.id')
        ->leftJoin('system_episodes', 'system_episodes.id', '=', 'quran_episodes.system_episoded_id')
        ->groupBy('quran_episodes.id','system_episodes.name',
        'quran_episodes.name','teachers.name',
        'quran_episodes.teacher_id',
        'quran_episodes.system_episoded_id','period','gender_id')
        ->get(['quran_episodes.name','quran_episodes.id','teachers.name as teacher_name','quran_episodes.teacher_id',
        'system_episodes.name as system_episodes_name','period','gender_id',
        'quran_episodes.system_episoded_id',
         DB::raw('COUNT(students.id) as student_number',) ]);

        return $results;
    }

    public function create(Request $request)
    {     $users=new teacher();
        $users=new system_episod();

    $users->type_users=$request->input('type_users');
         $users->save();
         if($users){
            return $this->apiResponse($users, message:"bbbnnnnn" ,status:201);
            }
            return $this->apiResponse(null, message:"fhjdhbhdbxb" ,status:401);

    }


    public function store(QuranEpisodesReques $request)
    {

        $quran_episod = quran_episodes::create(
            array_merge(
                $request->validated(), [

                ] ));

if($quran_episod){return response()->json([
    'message' => 'quran _episod successfully registered','quran_episod' => $quran_episod,], 201);}
        return response()->json([
            'message' => 'quran_episod nut successfully registered',
            'quran_episod' => null
        ], 400);
}
    public function show(string $id)
    {
        $quran_episodes=QuranEpsisadesResources::collection(quran_episodes::with('identity',
        'gender','nationality',)->get());
        return response()->json([ 'message' => 'quran_episodes not id successfully registered',
        'quran_episodes' => $quran_episodes, ], 201);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuranEpisodesReques $request,$id) {

        $episad = quran_episodes::find($id);
        if(!$episad){
            return response()->json([
                'message' => 'quran_episad not id successfully registered',
                'quran_episad' => $episad
            ], 201); }
        $episad->update(
            array_merge(
                $request->validated(),
                [

                ])  );
if($episad){
        return response()->json([
            'message' => 'quran_episad successfully registered',
            'quran_episad' => $episad
        ], 201);}
       else{ return response()->json([
            'message' => 'quran_episad nut successfully registered',
            'quran_episad' => $episad
        ], 400);}


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quran_episad = quran_episodes::find($id);
        if(!$quran_episad){
            return response()->json([
                'message' => 'quran_episad not id successfully registered',
                'quran_episad' => $quran_episad
            ], 201);
                }

        $quran_episad->delete($id);
            if($quran_episad){return response()->json([
                'message' => 'quran_episad successfully registered',
                'quran_episad' => $quran_episad
            ], 201);}
        return response()->json([
            'message' => 'quran_episad not successfully registered',
            'quran_episad' => $quran_episad
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $quran_episad = quran_episodes::Truncate();;

            if($quran_episad){return response()->json([
                'message' => 'User successfully registered',
                'user' => $quran_episad
            ], 201);}
        return response()->json([
            'message' => 'quran_episad not successfully registered',
            'quran_episad' => $quran_episad
        ], 400);

    }
}
