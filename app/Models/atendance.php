<?php

namespace App\Models;
use App\Models\Attendance_teacher;
use App\Models\Attendance_student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atendance extends Model
{
    use HasFactory;
    protected $table ='atendances';
    protected $fillable = [
        'id',
    'name'];

    public function  Attendance_teacher(){
        return $this->hasMany(Attendance_teacher::class,'id_atendances','id');
    }
    public function  Attendance_student(){
        return $this->hasMany(Attendance_student::class,'id_atendances','id');
    }
}
