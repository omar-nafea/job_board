<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;


Route::get('/', indexController::class);  
Route::resource('posts', PostController::class);
Route::resource('writers', WriterController::class);
Route::resource('categories', CategoryController::class);


Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.show');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
     
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



