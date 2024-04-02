<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\period;
use App\Models\sex;
use App\Models\system_episod;
use App\Models\quran_episa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class QuranEpisadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =quran_episa::all();
        return view('quran.index', compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher=teacher::all();
         $period=period::all();
         $sex=sex::all();
        $system_episodes=system_episod::all();
        return view('quran.episades',compact('teacher','period','sex','system_episodes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table(table:'quran_episades')->insert([
            'name_episodes'=>$request->name_episodes,
            'number_student'=>$request->number_student,
            'Id_teacher'=>$request->Id_teacher,
            'Id_period'=>$request->Id_period,
            'sex_id'=>$request->sex_id,
            'Id_system_episoded'=>$request->Id_system_episoded,
        ]);
      // return response(content: 'تم الاضافة بنجاح');
       return redirect()->route('quran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(quran_episa $quran_episades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $post )
    {
        $post =quran_episa::find($post );
        $teacher=teacher::all();
        $period=period::all();
        $sex=sex::all();
       $system_episodes=system_episodes::all();
       return view('quran.edit',compact('post','teacher','period','sex','system_episodes'));
      }

    public function update(Request $request, $id)
    {
        $type_users=teacher::find($request->Id_teacher)->quran_episades();
        $type_users=period::find($request->Id_period);
       // $type_users=new quran_episades;
        $type_users= DB::table(table:'quran_episades')->where( 'id',$id)->update([
            'name_episodes'=>$request->name_episodes,
            'number_student'=>$request->number_student,
            'Id_teacher'=>$request->Id_teacher,
            'Id_period'=>$request->Id_period,
            'sex_id'=>$request->sex_id,
            'Id_system_episoded'=>$request->Id_system_episoded,
        ]);

        $type_users=sex::find($request->sex_id);
        $type_users=system_episod::find($request->Id_system);
         return redirect()->route('quran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table(table:'quran_episades')->where( 'id',$id)->delete();
        return redirect()->route('quran.index');
        //return $id;
    }
     public function deleteTruncate(){
        DB::table(table:'quran_episades')->Truncate();
        return redirect()->route('quran.index');
     }
}
