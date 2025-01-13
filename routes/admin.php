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
    Route::resource('danh-mucs', \App\Http\Controllers\Admin\DanhMucController::class);

    Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class);

    Route::resource('dang-tins', \App\Http\Controllers\Admin\DangTinController::class);

    Route::resource('danh-gias', \App\Http\Controllers\Admin\DanhGiaController::class);

    Route::resource('binh-luans', \App\Http\Controllers\Admin\BinhLuanController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    
    Route::resource('lien-he', \App\Http\Controllers\Admin\LienHeController::class);

    Route::get('tai-khoans/{id}/doanh-thu/ngay', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'layDoanhThuNgay'])->name('admin.doanhThuNgay');
Route::get('tai-khoans/{id}/doanh-thu/thang', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'layDoanhThuThang'])->name('admin.doanhThuThang');


