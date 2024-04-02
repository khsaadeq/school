<?php

namespace App\Models;

use App\Models\quran_episodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system_episod extends Model
{
    // use HasFactory;
    protected $table ='system_episodes';
    protected $fillable = [
        'id',
        'name',];
        public function quran_episades(){
            return $this ->hasMany(quran_episodes::class,'system_episoded_id','id');
        }

}
