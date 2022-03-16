<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;

use App\Http\Controllers\Backend\UserController;

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

});