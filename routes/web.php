<?php

use App\Http\Controllers\BarangBaruController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use Illuminate\Support\Facades\Route;

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

Route::get('dashboard', [DashboardController::class, 'index']);
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [DataBarangController::class, 'index']);
    Route::post('/list', [DataBarangController::class, 'list']);
});

Route::group(['prefix' => 'barang_baru'], function(){
    Route::get('/', [BarangBaruController::class, 'index']);
    Route::post('/list', [BarangBaruController::class, 'list']);
    Route::get('/create', [BarangBaruController::class, 'create']);
});
