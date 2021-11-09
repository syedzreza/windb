<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Admin\{
AdminController
};


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
    return view('admin.loginadmin');
});

//---------------------Admin routes------------------------------------------------------------------//
Route::post('/registersuccess', [AdminController::class, 'registeradmin'])->name('admin.registeradmin');
Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function(){
    Route::view('/login','admin.loginadmin')->name('login');
    Route::view('/register','admin.registeradmin')->name('register');

        Route::post('/login', [AdminController::class, 'store']);
});


Route::group([  'prefix'=>'admin',
    'middleware'=>['auth:admin']],function(){
       Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
       Route::get('/addUser',[AdminController::class,'addUser'])->name('admin.addUser');
       Route::post('/addUserConfirm',[AdminController::class,'addUserConfirm'])->name('admin.addUserConfirm');
       Route::post('/terminateuser/{id}',[AdminController::class,'terminateuser'])->name('admin.terminateuser');
     Route::get('/manageusers',[AdminController::class,'manageusersdashboard'])->name('admin.manageusers');
     Route::get('/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
     Route::post('/editconfirm/{id}',[AdminController::class,'editconfirm'])->name('admin.editconfirm');
     Route::post('/imagesdelete/{id}',[AdminController::class,'imagesdelete'])->name('admin.imagesdelete');

       Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');



});
// -------------------------------end of admin routes----------------------------------------------------------------------------//




