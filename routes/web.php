<?php

use App\Http\Controllers\Client\BangxephangController;
use App\Http\Controllers\Client\ChinhsachController;
use App\Http\Controllers\Client\ChiTietPlayerController;
use App\Http\Controllers\Client\DangKyController;
use App\Http\Controllers\Client\DangTinController;
use App\Http\Controllers\Client\DanhmucController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LienheController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\TaiKhoanController;
use App\Http\Controllers\Client\ThongtinController;
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


Route::get('/', [HomeController::class, 'index'])->name('client.index');
Route::get('/chi-tiet-player', [ChiTietPlayerController::class, 'index'])->name('client.chitietplayer');
Route::get('/dang-nhap', [LoginController::class, 'index'])->name('client.login');
Route::get('/dang-ky', [DangKyController::class, 'index'])->name('client.dangky');
Route::get('/bang-xep-hang', [BangxephangController::class, 'index'])->name('client.bangxephang');
Route::get('/chinh-sach', [ChinhsachController::class, 'index'])->name('client.chinhsach');
Route::get('/lien-he', [LienheController::class, 'index'])->name('client.lienhe');
Route::get('/danh-muc', [DanhmucController::class, 'index'])->name('client.danhmuc');
Route::get('/thong-tin-ca-nhan', [ThongtinController::class, 'index'])->name('client.thongtincanhan');
