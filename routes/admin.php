<?php

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
    // Home
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index']);

    Route::resource('tai-khoans', \App\Http\Controllers\Admin\TaiKhoanController::class);

    Route::resource('lich-su-don-thues', \App\Http\Controllers\Admin\LichSuThueController::class);

    Route::resource('to-caos', \App\Http\Controllers\Admin\ToCaoController::class);
