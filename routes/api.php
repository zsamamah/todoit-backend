<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',[UserController::class,'create']);
Route::post('/login',[UserController::class,'login']);
Route::post('/add_task',[TaskController::class,'store']);
Route::get('/user_tasks/{user}/{board_id}',[TaskController::class,'user_tasks']);
Route::get('/todo/{user}',[TaskController::class,'user_tasks_todo']);
Route::get('/doing/{user}',[TaskController::class,'user_tasks_doing']);
Route::get('/done/{user}',[TaskController::class,'user_tasks_done']);
Route::post('/save/{user}',[TaskController::class,'save']);
Route::post('/create_board',[BoardController::class,'store']);
Route::get('/user_boards/{user}',[BoardController::class,'get_boards']);
Route::post('/contact',[ContactController::class,'store']);
