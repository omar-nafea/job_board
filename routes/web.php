<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;


Route::get('/', indexController::class);  
Route::resource('posts', PostController::class);
Route::resource('writers', WriterController::class);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);



