<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Attendance_student;
use App\Http\Controllers\Controller;
// use App\Http\Resources\studentResources;
use App\Http\Resources\Attendance_studentResources;
use App\Http\Requests\Auth\Attendance_studentRequests;

class AttendanceStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexflutter()
    {
          $Attendance_student = Attendance_student::
        join('atendances', 'atendances.id', '=', 'attendance_students.id_atendances')
        ->join('students', 'students.id', '=', 'attendance_students.id_student')

        ->get(['attendance_students.*', 'students.name as student_name', 'atendances.name as atendances_name' ]);
        // return $Attendance_student;
        return response()->json(['message' => 'Attendance_student successfully registered',
         'Attendance_student' => $Attendance_student,], 200);

    }
    public function index(){
        $Attendance_student = Attendance_student::
        join('atendances', 'atendances.id', '=', 'attendance_students.id_atendances')
        ->join('students', 'students.id', '=', 'attendance_students.id_student')
        ->join('quran_episodes', 'quran_episodes.id', '=', 'students.quran_episod_id')
        ->get(['attendance_students.*', 'students.name as student_name', 'atendances.name as atendances_name','quran_episodes.name as school_name' ]);
        return $Attendance_student;
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
    public function store(Attendance_studentRequests $request)
    {
        $Attendance_student = Attendance_student::create( array_merge( $request->validated(),[] ));
        if($Attendance_student){return response()->json(['message' => 'Attendance_student successfully registered',
        'Attendance_student' => $Attendance_student  ], 201); }
        else{ return response()->json(['message' => 'Attendance_student not successfully registered',
        'Attendance_student' => null], 400);}
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {           $Attendance_student=Attendance_studentResources::collection
        (Attendance_student::with('student','atendance')->get());
            return response()->json([ 'message' => 'Attendance_student not id successfully registered',
            'Attendance_student' => $Attendance_student, ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance_student $attendance_student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Attendance_studentRequests $request,  $id)
    {
        $Attendance_student = Attendance_student::find($id);
        if(!$Attendance_student){
            return response()->json([
                'message' => 'Attendance_student not id successfully registered',
                'Attendance_student' => $Attendance_student
            ], 201);
                }
        $Attendance_student->update(
            array_merge($request->validated(), []));
            if($Attendance_student){return response()->json([
                'message' => 'Attendance_student successfully registered',
                'Attendance_student' => $Attendance_student  ], 201);}
            else{ return response()->json([
            'message' => 'Attendance_student not successfully registered',
            'Attendance_student' => $Attendance_student
        ], 400);}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance_student $attendance_student)
    {
        //
    }
}
