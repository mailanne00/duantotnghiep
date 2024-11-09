<?php

use App\Http\Controllers\Client\TaiKhoanController;
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

Route::get('/', function () {
    return view('client.index');
});

Route::get('tai-khoan/thong-tin-ca-nhan', [TaiKhoanController::class, 'index'])->name('taikhoan.thongtincanhan');
Route::get('tai-khoan/thong-ke', [TaiKhoanController::class, 'thongKe'])->name('taikhoan.thongKe');
Route::get('tai-khoan/email', [TaiKhoanController::class, 'email'])->name('taikhoan.email');
Route::get('tai-khoan/tai-khoan-va-mat-khau', [TaiKhoanController::class, 'taiKhoanVaMatKhau'])->name('taikhoan.taiKhoanVaMatKhau');
