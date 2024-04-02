<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student;
class month_business extends Model
{
    use HasFactory;
    protected $fillable =
        ['id',
        'id_student',
        'from_surah',
        'from_ayah',
        'to_surah',
        'to_ayah',];
        public function  student(){
            return $this->belongsTo(student::class,'id_student','id');
        }
}
