<?php

namespace App\Models;

use App\Models\student;
use App\Models\teacher;
use App\Models\gender;
use App\Models\system_episod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quran_episodes extends Model
{
    protected $table ='quran_episodes';
    // use HasFactory;
    protected $fillable =[
                'id',
                'name',
                'teacher_id',
                'period',
                'gender_id',
                'system_episoded_id',
    ];
    public function  teachers(){
        return $this->belongsTo(teacher::class,'teacher_id','id');
    }
      public function system_episod(){
        return $this ->belongsTo(system_episod::class,'system_episoded_id','id');
    }
    public function  student(){
        return $this->hasMany(student::class,'quran_episod_id','id');
    }
    public function  gender(){
        return $this->belongsTo(gender::class,'gender_id','id');
    }
}
