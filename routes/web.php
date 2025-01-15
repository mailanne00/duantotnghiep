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
use App\Http\Controllers\Client\RutTienController;
use App\Http\Controllers\Client\ThongtinController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Jobs\sendEmailJob;
use Illuminate\Support\Facades\Mail;
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

Route::get('/test', function () {
   sendEmailJob::dispatch('bactxph36951@fpt.edu.vn');
   echo "Đã gửi email";
});

Route::get('/', [HomeController::class, 'index'])->name('client.index');
Route::get('/modal-user/{id}', [HomeController::class, 'modalUser'])->name('client.modalUser');
Route::get('/tai-khoan/{id}', [TaiKhoanController::class, 'show'])->name('client.taikhoan.show');
Route::post('/tao-chat', [TaiKhoanController::class, 'taoChatMoi'])->name('client.taoChat');

Route::get('/dang-nhap', [LoginController::class, 'index'])->name('client.login');
Route::post('/dang-nhap', [LoginController::class, 'store'])->name('dangnhap.store');
Route::post('/dang-nhap-facebook', [LoginController::class, 'loginWithFacebook'])->name('dangnhap.facebook');
Route::get('/login-facebook-callback', [LoginController::class, 'loginFacebookCallBack'])->name('login.facebook.callback');
Route::get('/logout', [LoginController::class, 'logout'])->name('client.logout');

Route::get('/dang-ky', [DangKyController::class, 'index'])->name('client.dangky');
Route::post('/dang-ky/store', [DangKyController::class, 'store'])->name('dangky.store')->withoutMiddleware(VerifyCsrfToken::class);
Route::post('/dang-ky/verify-email', [DangKyController::class, 'verifyEmail'])->name('dangky.verifyEmail');

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
Route::delete('/player/{id}/delete-cccd', [ThongtinController::class, 'deleteCccd'])->name('player.delete_cccd');
Route::delete('/player/{id}/delete-video', [ThongtinController::class, 'deleteVideo'])->name('player.delete_video');

Route::get('/lich-su-thue', [LichSuThueController::class, 'index'])->name('client.lichSuThue');
Route::post('/lich-su-thue', [LichSuThueController::class, 'themDonThue'])->name('client.themDonThue');
Route::post('/lich-su-don-thue/{id}/huy-don', [LichSuThueController::class, 'huyDonThue'])->name('client.huyDonThue');
Route::post('/lich-su-don-thue/{id}/tu-choi-don', [LichSuThueController::class, 'tuChoiDonThue'])->name('client.tuChoiDonThue');
Route::post('/lich-su-don-thue/{id}/nhan-don', [LichSuThueController::class, 'nhanDonThue'])->name('client.nhanDonThue');
Route::delete('/lich-su-don-thue/{id}/xoa-don', [LichSuThueController::class, 'xoaDonThue'])->name('client.xoaDonThue');
Route::post('/lich-su-don-thue/{id}/ket-thuc-don', [LichSuThueController::class, 'ketThucDonThue'])->name('client.ketThucDonThue');
Route::get('/lich-su-duoc-thue', [LichSuThueController::class, 'lichSuDuocThue'])->name('client.lichSuDuocThue');
Route::put('/lich-su-duoc-thue/{id}', [LichSuThueController::class, 'suaTrangThaiDonThue'])->name('client.suaTrangThaiDonThue');

Route::post('/danh-gia/{id}', [LichSuThueController::class, 'danhGia'])->name('client.danhGia');

// Thanh toán vn pay
Route::post('/payment/create', [\App\Http\Controllers\Client\VNPayController::class, 'createPayment']);
Route::get('/payment/vnpay-return', [\App\Http\Controllers\Client\VNPayController::class, 'paymentReturn']);
Route::get('/nap-tien', [\App\Http\Controllers\Client\NapTienController::class, 'index'])->name('client.napTien');
Route::get('/nap-tien/create', [\App\Http\Controllers\Client\NapTienController::class, 'create'])->name('client.napTien.create');

Route::get('/thong-ke-tai-khoan', [\App\Http\Controllers\Client\ThongKeTaiKhoanController::class, 'index'])->name('client.thongKeTaiKhoan');
Route::get('/doanh-thu/ngay', [\App\Http\Controllers\Client\ThongKeTaiKhoanController::class, 'layDoanhThuNgay'])->name('client.doanhThuNgay');
Route::get('/doanh-thu/thang', [\App\Http\Controllers\Client\ThongKeTaiKhoanController::class, 'layDoanhThuThang'])->name('client.doanhThuThang');

Route::get('/bai-viet', [\App\Http\Controllers\Client\BaiVietController::class, 'index'])->name('client.baiViet');
Route::post('/bai-viet', [\App\Http\Controllers\Client\BaiVietController::class, 'store'])->name('client.baiViet.store');
Route::post('/bai-viet/{id}/binh-luan', [\App\Http\Controllers\Client\BaiVietController::class, 'storeBinhLuan'])->name('client.binhLuan.store');

Route::post('/theo-doi', [\App\Http\Controllers\Client\TheoDoiController::class, 'store'])->name('client.theoDoi.store');
Route::delete('/huy-theo-doi/{id}', [\App\Http\Controllers\Client\TheoDoiController::class, 'destroy'])->name('client.huyTheoDoi.destroy');

Route::get('/rut-tien', [RutTienController::class, 'index'])->name('client.rutTien');
Route::get('/rut-tien/create', [RutTienController::class, 'create'])->name('client.rutTien.create');
Route::post('/rut-tien',[RutTienController::class, 'store'])->name('client.rutTien.store');