<?php

namespace App\Models;
// use App\Models\parents;
use App\Models\student;
use App\Models\teacher;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nationality extends Model
{
    // use HasFactory;
    protected $table ='Nationality';
    protected $fillable = [
        'id',
    'name'];
    public function  teacher(){
        return $this->hasMany(teacher::class,'nationality_id','id');
    }
public function  student(){
        return $this->hasMany(student::class,'nationality_id','id');
    }
    public function  pare(){
        return $this->hasMany(teacher::class,'nationality_id','id');
    }

}
