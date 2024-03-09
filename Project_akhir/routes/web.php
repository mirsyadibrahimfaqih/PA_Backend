<?php

use App\Http\Controllers\Buku_tamuController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TamuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get(
    '/home',
    [HomeController::class, 'index']
    );
    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/buku_tamu', Buku_tamuController::class)->middleware('auth');

Route::resource('/jabatan', JabatanController::class)->middleware('auth');

Route::resource('/tamu', TamuController::class)->middleware('auth');

//Route get PDF
Route::get('bukupdf',[Buku_tamuController::class, 'bukuPDF']);

Route::get('/bukuexcel', [Buku_tamuController::class, 'export_excel']);

Route::get('jabatanpdf',[JabatanController::class, 'jabatanPDF']);

Route::get('/jabatanexcel', [JabatanController::class, 'export_excel']);

Route::get('tamupdf',[TamuController::class, 'tamuPDF']);

Route::get('/tamuexcel', [TamuController::class, 'export_excel']);

Route::get('/afterRegister' , function () {
    return view('layouts.afterRegister');
});

Route::get('/users' , function () {
    return view('layouts.users');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

