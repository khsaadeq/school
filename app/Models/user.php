<?php
namespace App\Models;
//use App\Models\type_users;
use App\Models\student;
use App\Models\teacher;
use App\Models\guardian;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;
use Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;
// use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
// use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * User
 */
class User extends Authenticatable implements  JWTSubject
{
    use HasApiTokens,HasFactory, Notifiable;
    // use HasRolesAndPermissions;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='users';
    protected $fillable = [
        'id',
        'user_name',
        'email',
        'password',
    ];
    // public function type_user(){
    //             return $this->belongsTo( type_users::class,'type_user_id','id');
    //             }
//     public function  teathers(){
//                     return $this->hasMany(teacher::class,'users_id','id');
//                 }
//     public function  students(){
//                     return $this->hasMany(student::class,'users_id','id');
//                 }
// public function  guardian(){
//                     return $this->hasMany(guardian::class,'users_id','id');
//                 }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
    // public function gitImageUrlAttribute(){
    //             return Storage::disk('imagesfp')->url($this->image);

    //             }
}
