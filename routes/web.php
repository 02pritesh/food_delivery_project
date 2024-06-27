<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
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
    return view('welcome');
});

Route::get('order',[AdminController::class,'show']);
Route::post('order',[AdminController::class,'home']);

Route::get('login',[AdminController::class,'login']);
Route::post('login',[AdminController::class,'loginUser']);

Route::get('logout',[AuthController::class,'logout']);

Route::get('edit/{id}',[AdminController::class,'edit']);
Route::post('edit',[AdminController::class,'editData']);

Route::get('delete/{id}',[AdminController::class,'deleteData']);
