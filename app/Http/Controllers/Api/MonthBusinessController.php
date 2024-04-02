<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\month_business;
use Illuminate\Http\Request;
// use App\Models\month_business;
use Illuminate\Support\Facades\Validator;
class MonthBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [

        //     'from_surah' => 'required|digits:2',
        //     'from_ayah' => 'required|digits:2',
        //     'to_surah' => 'required|digits:2',
        //     // 'number_identity' => 'required|digits_between:5,20',
        //     'to_ayah' => 'required|digits:2',]);
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }
        // $month_busines = month_business::insert(
        //     array_merge(
        //         $validator->validated(), [
        //         'id_student'=>$request->id_student,
        //         ]));
        // if($month_busines){
        //         return response()->json([
        //             'message' => 'month_busines successfully registered',
        //             'month_busines' => $month_busines
        //         ], 201);}
        //     else{
            //  return response()->json([
            //         'message' => 'month_busines not successfully registered',
            //         'month_busines' => $month_busines
            //     ], 400);


            }
                // Containe }

    /**
     * Display the specified resource.
     */
    public function show(month_business $month_business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(month_business $month_business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, month_business $month_business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(month_business $month_business)
    {
        //
    }
}
