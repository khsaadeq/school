<?php
namespace App\Models;
use App\Models\user;
use App\Models\type_users;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class type_user extends Model
{
    use HasFactory;
    //  users  اتعامل مع جدول في قاعدة البيانات اسمة
            //  protected $table="users";
        //  id لتغير او تبديل اسم الحقل
            // protected $primarykey = 'user_id';
            //
            //   timestamps لو مابتستخدم الحقل
            protected $table ='type_users';
            protected $fillable =[
        //   public $timestamps = false;

        'type_users',


];
// public function users(){
//     return $this ->hasMany(user::class, 'type_user_id','id');
// }


// public function student(){
//         return $this->belongsTo('App\Models\student', 'ID_sex');
//         }
}

