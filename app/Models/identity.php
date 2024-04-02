<?php

namespace App\Models;

use App\Models\parents;
use App\Models\student;
use App\Models\teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class identity extends Model
{
    use HasFactory;
    // public function  parents(){
    //     return $this->hasMany(parents::class,foreignKey:'ID_identtity');
    // }
    protected $table ='identities';
    protected $fillable = [
        'id',
    'type_identity'];
    // public function  parents(){
    //     return $this->hasMany(parents::class,'identtity_id','id');
    // }
public function  student(){
        return $this->hasMany(student::class,'identity_id','id');
    }
    public function  teacher(){
        return $this->hasMany(teacher::class,'identity_id','id');
    }
    // public function  teacher(){
    //     return $this->hasMany(teacher::class,'identity_id');
    // }
}
