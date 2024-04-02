<?php

namespace App\Models;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification_study extends Model
{
    protected $table ='qualification_studies';
    protected $fillable =[
        'id',
         'name',
 ];
    use HasFactory;

    public function teache(){
        return $this ->hasMany(Qualification_study::class, foreignKey: 'qualification_study_id');
    }
}
