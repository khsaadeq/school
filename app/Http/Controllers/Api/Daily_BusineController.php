<?php

namespace App\Http\Controllers\api;
use App\Models\daily__business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Daily_BusineController extends Controller
{
    public function store(Request $request){
        $DailyBusiness = daily__business::create(
        [
        'id_student'=>$request->id_student,
        'id_atendances'=>$request->id_atendances,
        'from_surah'=>$request->from_surah,
        'from_ayah'=>$request->id_student,
        'to_surah'=>$request->from_ayah,
        'to_ayah'=>$request->to_ayah,
            ] );
            if($DailyBusiness){
                return response()->json([
                    'message' => 'DailyBusiness successfully registered',
                    'DailyBusiness' => $DailyBusiness,
                ], 201);}
                return response()->json([
                    'message' => 'DailyBusiness nut successfully registered',
                    'DailyBusiness' => null
                ], 400);
    }
}
