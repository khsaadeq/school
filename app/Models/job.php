<?php

namespace App\Models;
use App\Models\teacter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // use HasFactory;
    protected $table ='jobs';
    protected $fillable = [
        'id',
    'name'];
    public function  teacher(){
        return $this->hasMany(teacter::class,'job_id','id');
    }
}
