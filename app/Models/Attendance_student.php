<?php

namespace App\Models;
use App\Models\atendance;
use App\Models\student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance_student extends Model
{
    // use HasFactory;
    use HasFactory;
    protected $table ='attendance_students';
    protected $fillable =
        [
            'id',
            'id_student',
            'id_atendances',
            'day_date',
        ];
    public function  atendance(){
        return $this->belongsTo(atendance::class,'id_atendances','id');
    }
    public function  student(){
        return $this->belongsTo(student::class,'id_student','id');
    }
}
