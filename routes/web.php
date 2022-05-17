<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','IsAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/admin-users',[AdminController::class,'users_page']);
    Route::get('/add-user',[AdminController::class,'create_user'])->name('create-user');
    Route::post('/add-user',[AdminController::class,'save_user'])->name('save-user');
    Route::get('/admin-users/{user}/edit',[AdminController::class,'edit_user'])->name('edit-user');
    Route::put('/admin-users/{user}/edit',[AdminController::class,'update_user'])->name('update-user');
    Route::delete('/admin-users/{user}/delete',[AdminController::class,'delete_user'])->name('delete-user');
    Route::resource('admin-contacts',ContactController::class);
});
