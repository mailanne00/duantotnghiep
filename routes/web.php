<?php

use App\Http\Controllers\Client\BangxephangController;
use App\Http\Controllers\Client\ChinhsachController;
use App\Http\Controllers\Client\ChiTietPlayerController;
use App\Http\Controllers\Client\DangKyController;
use App\Http\Controllers\Client\DanhmucController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LichSuThueController;
use App\Http\Controllers\Client\LienheController;
use App\Http\Controllers\Client\LoginController;
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
Route::get('/modal-user/{id}', [HomeController::class, 'modalUser'])->name('client.modalUser');
Route::get('/chi-tiet-player/{id}', [ChiTietPlayerController::class, 'index'])->name('client.chitietplayer');

Route::get('/dang-nhap', [LoginController::class, 'index'])->name('client.login');
Route::post('/dang-nhap', [LoginController::class, 'store'])->name('dangnhap.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('client.logout');


Route::get('/dang-ky', [DangKyController::class, 'index'])->name('client.dangky');
Route::post('/dang-ky/store', [DangKyController::class, 'store'])->name('dangky.store');

Route::get('/bang-xep-hang', [BangxephangController::class, 'index'])->name('client.bangxephang');
Route::get('/chinh-sach', [ChinhsachController::class, 'index'])->name('client.chinhsach');
Route::get('/lien-he', [LienheController::class, 'index'])->name('client.lienhe');
Route::get('/danh-muc', [DanhmucController::class, 'index'])->name('client.danhmuc');
Route::get('/danh-muc/{id}', [DanhmucController::class, 'show'])->name('client.danhmuc.show');
Route::get('/thong-tin-ca-nhan', [ThongtinController::class, 'index'])->name('client.thongtincanhan');
Route::put('/thong-tin-ca-nhan', [ThongtinController::class, 'update'])->name('client.thong-tin-ca-nhan.update');

Route::get('/lich-su-thue', [LichSuThueController::class, 'index'])->name('client.lichSuThue');
Route::post('/lich-su-thue', [LichSuThueController::class, 'themDonThue'])->name('client.themDonThue');
Route::get('/lich-su-duoc-thue', [LichSuThueController::class, 'lichSuDuocThue'])->name('client.lichSuDuocThue');
Route::put('/lich-su-duoc-thue/{id}', [LichSuThueController::class, 'suaTrangThaiDonThue'])->name('client.suaTrangThaiDonThue');
