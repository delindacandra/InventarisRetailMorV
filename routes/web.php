<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['ceklogin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);
    });
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_process', [AuthController::class, 'login_process']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [DataBarangController::class, 'index']);
    Route::post('/list', [DataBarangController::class, 'list']);
    Route::get('/create', [DataBarangController::class, 'create']);
    Route::post('/', [DataBarangController::class, 'store']);
    Route::get('/{id}/edit', [DataBarangController::class, 'edit']);
    Route::put('/{id}', [DataBarangController::class, 'update']);
    Route::delete('/{id}', [DataBarangController::class, 'destroy']);
});

Route::group(['prefix' => 'barang_masuk'], function () {
    Route::get('/', [BarangMasukController::class, 'index']);
    Route::post('/list', [BarangMasukController::class, 'list']);
    Route::get('/create', [BarangMasukController::class, 'create']);
    Route::get('/{id}', [BarangMasukController::class, 'show']);
    Route::post('/list_form', [BarangMasukController::class, 'list_form']);
    Route::post('/', [BarangMasukController::class, 'store']);
    Route::delete('/{id}', [BarangMasukController::class, 'destroy']);
});

Route::group(['prefix' => 'export'], function () {
    Route::get('/barang', [DataBarangController::class, 'export']);
    Route::get('/barang_masuk', [BarangMasukController::class, 'export']);
    Route::get('/barang_keluar', [BarangKeluarController::class, 'export']);
});

Route::group(['prefix' => 'barang_keluar'], function () {
    Route::get('/', [BarangKeluarController::class, 'index']);
    Route::post('/list', [BarangKeluarController::class, 'list']);
    Route::get('/create', [BarangKeluarController::class, 'create']);
    Route::get('/{id}', [BarangKeluarController::class, 'show']);
    Route::post('/list_form', [BarangKeluarController::class, 'list_form']);
    Route::post('/', [BarangKeluarController::class, 'store']);
    Route::delete('/{id}', [BarangKeluarController::class, 'destroy']);
    Route::get('/cetak/{id}', [BarangKeluarController::class, 'cetak'])->name('barang_keluar.cetak');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('/{id}/edit', [ProfileController::class, 'edit']);
    Route::put('/{id}', [ProfileController::class, 'update_fungsi']);
});
