<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;

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

// ================ Authentication Controller ================ //
Route::get('login', [AuthenticationController::class, 'loginPage'])->name('loginPage');
Route::post('loginProcess', [AuthenticationController::class, 'loginProcess'])->name('loginProcess');

// ================ Dashboard Controller ================ //
Route::get('dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboardPage')->middleware('checkauth');

// ================ Kategori Controller ================ //
Route::prefix('kategori')->group(function(){
    Route::get('/list', [KategoriController::class, 'getListKategori'])->name('getListKategori')->middleware('checkauth');
    Route::get('/formEdit/{id}', [KategoriController::class, 'formEditKategori'])->name('formEditKategori')->middleware('checkauth');
    
    Route::post('prosesAddKategori', [KategoriController::class, 'prosesAddKategori'])->name('prosesAddKategori');
    Route::post('prosesUpdateKategori', [KategoriController::class, 'prosesUpdateKategori'])->name('prosesUpdateKategori');
    Route::get('prosesDeleteKategori', [KategoriController::class, 'prosesDeleteKategori'])->name('prosesDeleteKategori');
    
});