<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Attendance_teacher;
use App\Http\Controllers\Controller;
use App\Http\Resources\Attendance_teacherResources;
use App\Http\Requests\Auth\Attendance_teacherRequesrs;
use Illuminate\Support\Facades\DB;

class AttendanceTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { $Attendance_teacher = Attendance_teacher::
        join('atendances', 'atendances.id', '=', 'attendance_teachers.id_atendances')
        ->join('teachers', 'teachers.id', '=', 'attendance_teachers.teacher_id')

        ->get(['attendance_teachers.*', 'teachers.name as teacher_name', 'atendances.name as atendances_name' ]);
        // return $Attendance_student;
        // $Attendance_teacher=Attendance_teacher::get();
        return $Attendance_teacher ;
    }

    public function emp_report( $teacher_id,$start_date,$end_date){

        $results=
        DB::table('attendance_teachers')
         ->Join('teachers', 'teachers.id', '=', 'attendance_teachers.teacher_id')
         ->Join('jobs', 'jobs.id', '=', 'teachers.job_id')
         ->where('attendance_teachers.teacher_id', $teacher_id)
         ->groupBy('attendance_teachers.teacher_id','teachers.name','teachers.salary','jobs.name')
         ->where('attendance_teachers.id_atendances', 2)
         ->whereBetween('attendance_teachers.day_date', [$start_date,$end_date])
        ->get(['attendance_teachers.teacher_id','teachers.name','teachers.salary','jobs.name as job_name',
        DB::raw('teachers.salary DIV 30 * COUNT(attendance_teachers.id_atendances) as opponent'),
        DB::raw('teachers.salary - (teachers.salary DIV 30 * COUNT(attendance_teachers.id_atendances)) as payable'),
         DB::raw('COUNT(attendance_teachers.id_atendances) as numberOfAbsences',) ]);

        return $results;
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
    public function store(Attendance_teacherRequesrs $request)
    {
        $Attendance_teacher = Attendance_teacher::create( array_merge( $request->validated(),[] ));
        if($Attendance_teacher){return response()->json(['message' => 'Attendance_teacher successfully registered',
        'Attendance_teacher' => $Attendance_teacher  ], 201); }
        else{ return response()->json(['message' => 'Attendance_teacher not successfully registered',
        'Attendance_teacher' => null], 400);}
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $Attendance_teacher=Attendance_teacherResources::collection
        (Attendance_teacher::with('teacher','atendance')->get());

            {
            return response()->json([ 'message' => 'Attendance_teacher not id successfully registered',
            'Attendance_teacher' => $Attendance_teacher, ], 201); }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) { $Attendance_teacher = Attendance_teacher::find($id);
        if($Attendance_teacher){
            return response()->json([
                'message' => 'Attendance_teacher not id successfully registered',
                'Attendance_teacher' => $Attendance_teacher
            ], 201);
                } }

    /**
     * Update the specified resource in storage.
     */
    public function update(Attendance_teacherRequesrs $request, $id)
    {
        $Attendance_teacher = Attendance_teacher::find($id);
        if(!$Attendance_teacher){
            return response()->json([
                'message' => 'Attendance_teacher not id successfully registered',
                'Attendance_teacher' => $Attendance_teacher
            ], 201);
                }
        $Attendance_teacher->update(
            array_merge($request->validated(), []));
            if($Attendance_teacher){return response()->json([
                'message' => 'Attendance_teacher successfully registered',
                'Attendance_teacher' => $Attendance_teacher  ], 201);}
            else{ return response()->json([
            'message' => 'Attendance_teacher not successfully registered',
            'Attendance_teacher' => $Attendance_teacher
        ], 400);}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance_teacher $attendance_teacher)
    {
        //
    }
}
