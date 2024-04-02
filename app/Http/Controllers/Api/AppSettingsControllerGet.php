<?php

namespace App\Http\Controllers\Api;
// use App\Models\job;
// //use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
use App\Models\gender;
use App\Models\identity;
use App\Models\nationality;
use App\Models\Qualification_study;
use App\Models\atendance;
use App\Models\system_episod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AppSettingsControllerGet extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create() { $nationality=nationality::get();
        return $nationality;
    }
    public function index_identity()
     { $identity=identity::git();
        return response()->json(['message' => 'User successfully registered','identity' => $identity], 200);
    }
      public function index()
      { $index=nationality::git();
        return response()->json(['message' => 'User successfully registered','index_nationality' => $index], 200);
    }
       public function index_Qualification_study()
       { $type=Qualification_study::git();
        return $type;}
        public function index_atendance()
        { $type=atendance::git();
         return $type;}
         public function index_system_episod()
         { $type=system_episod::git();
            return response()->json(['message' => 'Attendance_student successfully registered', 'Attendance_student' => $type,], 200);
        }
        public function count(){


$teachersCount = DB::table('teachers')->count();
$studentsCount = DB::table('students')->count();
$quranEpisodesCount = DB::table('quran_episodes')->count();
$parentsCount = DB::table('parents')->count();

$queryResult = [

    'teachers_number' => $teachersCount,
    'students_number' => $studentsCount,
    'schools_number' => $quranEpisodesCount,
    'parents_number' => $parentsCount,
];

return $queryResult;
        }
}
