<?php

namespace App\Http\Controllers\Api;

use App\Models\Parant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParentResources;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Resources\Userreso;
use App\Http\Requests\Auth\GuardianRequest;
use App\Http\Controllers\Api\ApiResponseTrait;

class GuardianController extends Controller
{
    // use ApiResponseTrait;

    public function index(){
        $parents = Parant::
        join('genders', 'genders.id', '=', 'parents.gender_id')
        ->get(['parents.*', 'parents.gender_id', 'genders.name as gender_name']);
        return $parents;
    }

    public function create(Request $request){}

    public function store(GuardianRequest $request)
    { $guardian = Parant::create( array_merge( $request->validated(),['password' => bcrypt($request->password),]));
        if($guardian){return response()->json(['message' => 'guardian successfully registered',
        'guardian' => $guardian  ], 201); }
        else{ return response()->json(['message' => 'guardian not successfully registered',
        'guardian' => null], 400);}
}
    public function show() {
        $guardian=ParentResources::collection(Parant::with('gender')->get());

        //   $guardian = Parant::find($id);if($guardian)
        {
        return response()->json([ 'message' => 'guardian not id successfully registered',
        'guardian' => $guardian, ], 201); }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $guardian = Parant::find($id);
        if($guardian){
            return response()->json([
                'message' => 'guardian not id successfully registered',
                'guardian' => $guardian
            ], 201);
                } }
    /**
     * Update the specified resource in storage.
     */
    public function update(GuardianRequest $request, $id) {
        $guardian = Parant::find($id);
        if(!$guardian){
            return response()->json([
                'message' => 'guardian not id successfully registered',
                'guardian' => $guardian
            ], 201);
                }
        $guardian->update(
            array_merge($request->validated(), ['password' => bcrypt($request->password),]));
            if($guardian){return response()->json([
                'message' => 'guardian successfully registered',
                'guardian' => $guardian  ], 201);}
            else{ return response()->json([
            'message' => 'guardian not successfully registered',
            'guardian' => $guardian
        ], 400);}  }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guardian = Parant::find($id);
        if(!$guardian){
            return response()->json([
                'message' => 'guardian not id successfully registered',
                'guardian' => $guardian
            ], 201);
                }

        $guardian->delete($id);
            if($guardian){return response()->json([
                'message' => 'guardian successfully registered',
                'guardian' => $guardian
            ], 201);}
        return response()->json([
            'message' => 'guardian not successfully registered',
            'guardian' => $guardian
        ], 400);

    }
    public function deleteTruncate(string $id)
    {
        $guardian = Parant::Truncate();;

            if($guardian){return response()->json([
                'message' => 'guardian successfully registered',
                'guardian' => $guardian
            ], 201);}
        return response()->json([
            'message' => 'guardian not successfully registered',
            'guardian' => $guardian
        ], 400);

    }
}
