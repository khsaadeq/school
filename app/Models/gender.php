<?php

namespace App\Models;

use App\Models\Parant;
use App\Models\student;
use App\Models\teacher;
use App\Models\quran_episodes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class gender extends Model
{
    use HasFactory;
    protected $table ='genders';
    protected $fillable = [
        'id',
    'name'];
    public function  guardian(){
        return $this->hasMany(Parant::class,'gender_id','id');
    }
    // public function  student(){
    //     return $this->hasMany(student::class,'gender_id','id');
    // }
    // public function  teacher(){
    //     return $this->hasMany(teacher::class,'gender_id','id');
    // }
    public function  quran_episodes(){
        return $this->hasMany(quran_episodes::class,'gender_id','id');
    }
}
