<?php

namespace App\Models;
use App\Models\gender;
use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parant extends Authenticatable implements JWTSubject
{
    use HasFactory,HasApiTokens, Notifiable;
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
   // use HasFactory;
    protected $table ='parents';
    protected $fillable = [
        'id',
        'name',
        'gender_id',
        'job',
        'social_status',
        'email',
        'phone',
        'password',
    ];

    public function  gender(){
        return $this->belongsTo(gender::class,'gender_id','id');
    }
    public function  student(){
        return $this->hasMany(student::class,'guardian_id','id');
    }
}
