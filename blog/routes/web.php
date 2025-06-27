<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Session;


Route::middleware('SetLang')->group(function () {
    Route::get('/', function () {

        return view('welcome');
    });
    
    Route::get('setlang/{lang}', function ($lang) {
        Session::put('lang', $lang);
        return redirect('/');
    });
});


Route::get('users', [UserController::class, 'users']);
Route::get('users', [UserController::class, 'users']);
Route::get('fetch', [UserController::class, 'getFormApi']);
Route::view('user', 'user');
Route::post('add', [UserController::class, 'addUser']);

Route::view('about', 'about');


Route::view('add', 'add-students');
Route::post('add',[StudentController::class,'addStudents']);
Route::get('students',[StudentController::class,'studentList']);
Route::get('delete/{id}',[StudentController::class,'deleteStudent']);
Route::get('edit-student/{id}',[StudentController::class,'editStudent']);
Route::put('update-student/{id}',[StudentController::class,'updateStudent']);
Route::get('search', [StudentController::class, 'searchStudents']);
Route::post('delete-multiple',[StudentController::class,'deleteMultiple']);