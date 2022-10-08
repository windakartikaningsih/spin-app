<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KatalogController;

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
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

// ================ Dashboard Controller ================ //
Route::get('dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboardPage')->middleware('checkauth');

// ================ Kategori Controller ================ //
Route::prefix('kategori')->group(function(){
    Route::get('/list', [KategoriController::class, 'getListKategori'])->name('getListKategori')->middleware('checkauth');
    // Route::get('/formEdit/{id}', [KategoriController::class, 'formEditKategori'])->name('formEditKategori')->middleware('checkauth');
    
    Route::post('prosesAddKategori', [KategoriController::class, 'prosesAddKategori'])->name('prosesAddKategori');
    Route::post('prosesEditKategori', [KategoriController::class, 'prosesEditKategori'])->name('prosesEditKategori');
    Route::get('prosesDeleteKategori', [KategoriController::class, 'prosesDeleteKategori'])->name('prosesDeleteKategori');
    
});

// ================ Katalog Controller ================ //
Route::prefix('katalog')->group(function(){
    Route::get('/list', [KatalogController::class, 'getListKatalog'])->name('getListKatalog')->middleware('checkauth');
    Route::get('/formAdd', [KatalogController::class, 'formAddKatalog'])->name('formAddKatalog')->middleware('checkauth');
    Route::get('/formEdit/{id}', [KatalogController::class, 'formEditKatalog'])->name('formEditKatalog')->middleware('checkauth');
    
    Route::post('prosesAddKatalog', [KatalogController::class, 'prosesAddKatalog'])->name('prosesAddKatalog');
    Route::post('prosesEditKatalog', [KatalogController::class, 'prosesEditKatalog'])->name('prosesEditKatalog');
    Route::get('prosesDeleteKatalog', [KatalogController::class, 'prosesDeleteKatalog'])->name('prosesDeleteKatalog');
    
});