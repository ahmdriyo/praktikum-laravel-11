<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/kategoris', \App\Http\Controllers\KategoriController::class);
Route::resource('/kustomers', \App\Http\Controllers\KustomerController::class);
Route::resource('/satuans', \App\Http\Controllers\SatuanController::class);
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);