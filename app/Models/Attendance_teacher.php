<?php

namespace App\Models;
use App\Models\atendance;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance_teacher extends Model
{
    // use HasFactory;
    protected $table ='attendance_teachers';
    protected $fillable =
        [
            'id',
            'teacher_id',
            'id_atendances',
            'day_date',
        ];
    public function  atendance(){
        return $this->belongsTo(atendance::class,'id_atendances','id');
    }
    public function  teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }
}
