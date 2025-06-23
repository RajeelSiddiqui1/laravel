<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('users',[UserController::class,'users']);
Route::get('users',[UserController::class,'users']);
Route::get('fetch', [UserController::class, 'getFormApi']);