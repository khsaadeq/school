<?php
use App\Http\Controllers\auth\SexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuranEpisadesController;
use App\Http\Controllers\auth\TeacherController;
use App\Http\Controllers\auth\ParentsController;
use App\Http\Controllers\auth\StudentController;
use App\Http\Controllers\auth\UserController;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('sex', SexController::class);

Route::controller(QuranEpisadesController::class)->group( function ($id) {

Route::get('quran/episades',  'create')->name(name: 'quran.episades');
Route::post('quran/store', 'store')->name(name: 'quran.store');
Route::get('quran/index',  'index')->name(name: 'quran.index');
Route::get('quran/edit/{id}',  'edit')->name(name: 'quran.edit');
Route::post('quran/update/{id}',  'update')->name(name: 'quran.update');
Route::get('quran/destroy/{id}','destroy')->name(name: 'quran.destroy');
Route::get('quran/delete/all/Truncate','deleteTruncate')->name(name: 'quran.delete.all.Truncate');

});


Route::get('student',function(){
    return 'hello student';
})->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});

Route::controller(TeacherController::class)->group( function ($id) {
Route::get('teacher/insert',  'create')->name(name: 'teacher.insert');
Route::post('teacher/store', 'store')->name(name: 'teacher.store');
Route::get('teacher/index',  'index')->name(name: 'teacher.index');
Route::get('teacher/edit/{id}',  'edit')->name(name: 'teacher.edit');
Route::post('teacher/update/{id}',  'update')->name(name: 'teacher.update');
Route::get('teacher/destroy/{id}','destroy')->name(name: 'teacher.destroy');
Route::get('teacher/delete/all/Truncate','deleteTruncate')->name(name: 'teacher.delete.all.Truncate');

});


Route::get('/', function () {
    return view('welcome');
});

Route::controller(StudentController::class)->group( function ($id) {
Route::get('student/insert',  'create')->name(name: 'student.insert');
Route::post('student/store', 'store')->name(name: 'student.store');
Route::get('student/index', 'index')->name(name: 'student.index');
Route::get('student/edit/{id}',  'edit')->name(name: 'student.edit');
Route::post('student/update/{id}',  'update')->name(name: 'student.update');
// Route::get('student/destroy/{id}','destroy')->name(name: 'student.dstudebtestroy');
Route::get('student/delete/all/Truncate','deleteTruncate')->name(name: 'student.delete.all.Truncate');

});


Route::get('/', function () {
    return view('welcome');
});

Route::controller(ParentsController::class)->group( function ($id) {
Route::get('parent/insert',  'create')->name(name: 'parent.insert');
Route::post('parent/store', 'store')->name(name: 'parent.store');
Route::get('parent/index',  'index')->name(name: 'parent.index');
Route::get('parent/edit/{id}',  'edit')->name(name: 'parent.edit');
Route::post('parent/update/{id}',  'update')->name(name: 'parent.update');
Route::get('parent/destroy/{id}','destroy')->name(name: 'parent.destroy');
Route::get('parent/delete/all/Truncate','deleteTruncate')->name(name: 'parent.delete.all.Truncate');
// Route::get('parent/delete/all/Truncate','deleteTruncate')->name(name: 'parent.delete.all.Truncate');
});

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group( function ($id) {
Route::get('user/insert',  'create')->name(name: 'user.insert');

Route::post('user/store', 'store')->name(name: 'user.store');
Route::get('user/index',  'index')->name(name: 'user.index');
Route::get('user/edit/{id}',  'edit')->name(name: 'user.edit');
Route::post('user/update/{id}',  'update')->name(name: 'user.update');
Route::get('user/destroy/{id}','destroy')->name(name: 'user.destroy');
Route::get('user/delete/all/Truncate','deleteTruncate')->name(name: 'user.delete.all.Truncate');
// Route::get('user/restore/{id}','show')->name(name: 'user.restore');
Route::get('user/softDelete','show1')->name(name: 'user.softDelete');
});
// Route::resource('user', UserController::class);
Route::get('user/indexs', [StudentController::class ,'show'])->name(name: 'user.indexs');
Route::get('user/indexs', [\App\Http\Controllers\TypeUserController::class ,'create'])->name( 'user.indexs');
