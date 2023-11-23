<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Yayasan;
use App\Http\Controllers\Login;

Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login/proses', [Login::class, 'proses']);
Route::get('/logout', [Login::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['cekUserLogin:1']], function(){
        Route::resource('admin', Admin::class);
    });
    Route::group(['middleware' => ['cekUserLogin:2']], function(){
        Route::resource('yayasan', Yayasan::class);
    });
});

Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/tambahSupplier', [SupplierController::class, 'tambah']);
Route::post('/save', [SupplierController::class, 'save']);
Route::delete('/delete/{id}', [SupplierController::class, 'delete']);
Route::put('/edit/{id}', [SupplierController::class, 'edit']);
Route::get('/update/{id}', [SupplierController::class, 'update']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/save', [BarangController::class, 'save']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::delete('barang/delete/{id}', [BarangController::class, 'delete']);

Route::get('/pinjam', [PinjamController::class, 'index']);
Route::get('/tambahpinjam', [PinjamController::class, 'tambah']);
Route::post('/tambahpinjam/save', [PinjamController::class, 'save']);