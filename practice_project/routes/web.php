<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// product
Route::get('/product-list',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/edit/{product}',[ProductController::class,'edit'])->name('products.edit');
Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.delete');

// user 
Route::get('register',[UserController::class,'RegisterView'])->name('auth.registerview');
Route::post('register',[UserController::class,'register'])->name('auth.register');
Route::get('login',[UserController::class,'LoginView'])->name('auth.loginview');
Route::post('login',[UserController::class,'login'])->name('auth.login');
Route::get('logout',[UserController::class,'logout'])->name('auth.logout');