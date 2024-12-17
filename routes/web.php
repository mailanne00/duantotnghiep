<?php

use App\Http\Controllers\Client\BangxephangController;
use App\Http\Controllers\Client\ChinhsachController;
use App\Http\Controllers\Client\ChiTietPlayerController;
use App\Http\Controllers\Client\DangKyController;
use App\Http\Controllers\Client\DanhGiaController;
use App\Http\Controllers\Client\DanhmucController;
use App\Http\Controllers\Client\TaiKhoanController;
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
Route::get('/tai-khoan/{id}', [TaiKhoanController::class, 'show'])->name('client.taikhoan.show');

Route::get('/dang-nhap', [LoginController::class, 'index'])->name('client.login');
Route::post('/dang-nhap', [LoginController::class, 'store'])->name('dangnhap.store');
Route::post('/dang-nhap-facebook', [LoginController::class, 'loginWithFacebook'])->name('dangnhap.facebook');
Route::get('/login-facebook-callback', [LoginController::class, 'loginFacebookCallBack'])->name('login.facebook.callback');
Route::get('/logout', [LoginController::class, 'logout'])->name('client.logout');

Route::get('/dang-ky', [DangKyController::class, 'index'])->name('client.dangky');
Route::post('/dang-ky/store', [DangKyController::class, 'store'])->name('dangky.store');

Route::get('/bang-xep-hang', [BangxephangController::class, 'index'])->name('client.bangxephang');
Route::get('/chinh-sach', [ChinhsachController::class, 'index'])->name('client.chinhsach');
Route::get('/lien-he', [LienheController::class, 'index'])->name('client.lienhe');
Route::get('/lien-he/create', [LienheController::class, 'create'])->name('client.lienhe.create');
Route::post('/lien-he', [LienheController::class, 'store'])->name('client.lienhe.store');
Route::get('/danh-muc', [DanhmucController::class, 'index'])->name('client.danhmuc');
Route::get('/tai-khoan', [TaiKhoanController::class, 'index'])->name('client.taikhoan');
Route::get('/top-danh-gia', [TaiKhoanController::class, 'topDanhGia'])->name('client.topDanhGia');
Route::get('/hot-player', [TaiKhoanController::class, 'topHot'])->name('client.topHot');
Route::get('/danh-muc/{id}', [DanhmucController::class, 'show'])->name('client.danhmuc.show');
Route::get('/thong-tin-ca-nhan', [ThongtinController::class, 'index'])->name('client.thongtincanhan');
Route::put('/thong-tin-ca-nhan', [ThongtinController::class, 'update'])->name('client.thong-tin-ca-nhan.update');

Route::get('/lich-su-thue', [LichSuThueController::class, 'index'])->name('client.lichSuThue');
Route::post('/lich-su-thue', [LichSuThueController::class, 'themDonThue'])->name('client.themDonThue');
Route::get('/lich-su-duoc-thue', [LichSuThueController::class, 'lichSuDuocThue'])->name('client.lichSuDuocThue');
Route::put('/lich-su-duoc-thue/{id}', [LichSuThueController::class, 'suaTrangThaiDonThue'])->name('client.suaTrangThaiDonThue');

// Thanh toán vn pay
Route::get('/payment/create', [\App\Http\Controllers\Client\VNPayController::class, 'createPayment']);
Route::get('/payment/vnpay-return', [\App\Http\Controllers\Client\VNPayController::class, 'paymentReturn']);
Route::get('/nap-tien', [\App\Http\Controllers\Client\NapTienController::class, 'index'])->name('client.napTien');
Route::get('/nap-tien/create', [\App\Http\Controllers\Client\NapTienController::class, 'create'])->name('client.napTien.create');

Route::get('/thong-ke-tai-khoan', [\App\Http\Controllers\Client\ThongKeTaiKhoanController::class, 'index'])->name('client.thongKeTaiKhoan');

Route::get('/bai-viet', [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('client.baiViet');
Route::post('/bai-viet', [\App\Http\Controllers\Client\BaiVietController::class, 'store'])->name('client.baiViet.store');
