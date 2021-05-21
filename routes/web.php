<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/',function(){
  return view('welcome');

});

Route::get("user", [UserController::class, 'create']);
Route::post("user/create", [UserController::class, 'store']);
Route::get("/main", [UserController::class, 'index']);
Route::post('/main/checklogin', [UserController::class, 'checklogin']);
Route::get('main/dashboard', [UserController::class, 'dashboard']);
Route::get('main/logout', [UserController::class, 'logout']);
Route::get('main/dashboard',[UserController::class, 'inde']);


?>
