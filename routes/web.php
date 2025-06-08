<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::resource('/products', ProductController::class);
Route::resource('/kategoris', KategoriController::class);
Route::resource('/kustomers', \App\Http\Controllers\KustomerController::class);
Route::resource('/satuans', \App\Http\Controllers\SatuanController::class);


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin',[LoginController::class,'actionlogin'])->name('actionlogin');
Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('actionlogout',[LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('printpdf', [UserController::class, 'printPDF']) -> name('printuser');
Route::get('printexcel', [UserController::class, 'userExcel']) -> name('exportuser');

//Product
Route::get('printProductPdf', [ProductController::class, 'printPDF']) -> name('printproduct');
Route::get('printKategoriPdf', [KategoriController::class, 'printPDF']) -> name('printkategori');