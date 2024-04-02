<?php
namespace App\Models;
use image;
use App\Models\gender;
use App\Models\Parant;
use App\Models\identity;
use App\Models\nationality;
use App\Models\Daily_Business;
use App\Models\month_business;
use App\Models\quran_episodes;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Attendance_student;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class student extends Authenticatable implements JWTSubject
{
    use HasFactory,HasApiTokens, Notifiable;
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
   // use HasFactory;
   protected $table ='students';
    protected $fillable = [
    ' id', 'name', 'address', 'school','identity_id','number_identity',
        'nationality_id','guardian_id', 'link_kinship','previous_save',
        'date_Join','quran_episod_id','birth_date','email','phone','password',
    ];

public function getImageAttribute($img){
return url('/imagesfp').'/'.$img;
}
    public function  identity(){
        return $this->belongsTo(identity::class,'identity_id','id');
    }

    public function  nationality(){
        return $this->belongsTo(nationality::class,'nationality_id','id');
    }
    public function  Paran(){
        return $this->belongsTo(Parant::class,'guardian_id','id');
    }
    public function  quran_episod(){
        return $this->belongsTo(quran_episodes::class,'quran_episod_id');
    }
    public function  Daily_Business(){
        return $this->hasMany(Daily_Business::class,'id_student','id');
    }
    public function  month_business(){
        return $this->hasMany(month_business::class,'id_student','id');
    }
    public function  Attendance_student(){
        return $this->hasMany(Attendance_student::class,'id_student','id');
    }
    // public function  gender(){
    //     return $this->belongsTo(gender::class,'gender_id','id');
    // }

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    // public function getJWTIdentifier() {
    //     return $this->getKey();
    // }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    // public function getJWTCustomClaims() {
    //     return [];
    // }
    // public function gitImageUrlAttribute(){
    //     return Storage::disk('imagesfp')->url($this->image);

    //     }

}
