<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;

use App\Http\Controllers\Backend\UserController;

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
          Route::get('/login',[AdminController::class,'loginForm']);
          Route::post('/login',[AdminController::class,'store'])->name('admin.login');


});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');



//user logout

  Route::get('/user/logout',[MainUserController::class,'logout'])->name('user.logout');
  Route::get('/user/profile',[MainUserController::class,'Userprofile'])->name('user.profile');
  Route::get('/user/profile/edit',[MainUserController::class,'UserprofileEdit'])->name('user.profile.edit');
  Route::get('/user/password',[MainUserController::class,'UserPassword'])->name('user.password.view');
  Route::post('/user/password/update',[MainUserController::class,'UserPasswordUpdate'])->name('password.update');

//admin logout
  Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');


//user management  all Route



Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('view.user');

   Route::get('/add',[UserController::class,'UserAdd'])->name('users.add');
   Route::post('/store',[UserController::class,'UserStore'])->name('users.store');

    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('users.update');

     Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('users.delete');

});


Route::prefix('profiles')->group(function(){


    Route::get('/view',[ProfileController::class,'ViewProfile'])->name('profile.view');

    Route::get('/add',[UserController::class,'UserAdd'])->name('users.add');
    Route::post('/store',[UserController::class,'UserStore'])->name('users.store');

    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('users.update');

    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('users.delete');



});



Route::prefix('setups')->group(function(){
   Route::get('/student/class/view',[StudentClassController::class,'ViewStudent'])->name('student.class.view');
   Route::get('/student/class/add',[StudentClassController::class,'StudentClassAdd'])->name('studen.class.add');

  Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');

 Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');

 Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');

  Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');




  // Student Year Routes 

Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');

Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');

Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');

Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');

Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');

Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');



});