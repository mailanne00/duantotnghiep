<?php

use App\Http\Controllers\Client\DangTinController;
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

Route::get('/', [TaiKhoanController::class, 'index'])->name('client.index');
Route::get('tai-khoan/thong-tin-ca-nhan', [TaiKhoanController::class, 'thongTinCaNhan'])->name('taikhoan.thongtincanhan');
Route::get('tai-khoan/thong-ke', [TaiKhoanController::class, 'thongKe'])->name('taikhoan.thongKe');
Route::get('tai-khoan/email', [TaiKhoanController::class, 'email'])->name('taikhoan.email');
Route::get('tai-khoan/tai-khoan-va-mat-khau', [TaiKhoanController::class, 'taiKhoanVaMatKhau'])->name('taikhoan.taiKhoanVaMatKhau');
Route::get('tai-khoan/khoa-bao-ve', [TaiKhoanController::class, 'khoaBaoVe'])->name('taikhoan.khoaBaoVe');
Route::get('tai-khoan/vip', [TaiKhoanController::class, 'vip'])->name('taikhoan.vip');
Route::get('tai-khoan/hien-thi', [TaiKhoanController::class, 'hienThi'])->name('taikhoan.hienThi');
Route::get('tai-khoan/lich-su-donate', [TaiKhoanController::class, 'lichSuDonate'])->name('taikhoan.lichSuDonate');
Route::get('tai-khoan/lich-su-duo', [TaiKhoanController::class, 'lichSuDuo'])->name('taikhoan.lichSuDuo');
Route::get('tai-khoan/lich-su-tao-code', [TaiKhoanController::class, 'lichSuTaoCode'])->name('taikhoan.lichSuTaoCode');
Route::get('tai-khoan/bien-dong-so-du', [TaiKhoanController::class, 'bienDongSoDu'])->name('taikhoan.bienDongSoDu');
Route::get('tai-khoan/lich-su-mua-the', [TaiKhoanController::class, 'lichSuMuaThe'])->name('taikhoan.lichSuMuaThe');
Route::get('tai-khoan/dai-ly-card', [TaiKhoanController::class, 'daiLyCard'])->name('taikhoan.daiLyCard');
Route::get('tai-khoan/thanh-toan', [TaiKhoanController::class, 'thanhToan'])->name('taikhoan.thanhToan');
Route::get('tai-khoan/vi', [TaiKhoanController::class, 'vi'])->name('taikhoan.vi');
Route::get('tai-khoan/hashtags', [TaiKhoanController::class, 'hashtags'])->name('taikhoan.hashtags');
Route::get('tai-khoan/url', [TaiKhoanController::class, 'url'])->name('taikhoan.url');
Route::get('tai-khoan/mang-xa-hoi', [TaiKhoanController::class, 'mangXaHoi'])->name('taikhoan.mangXaHoi');
Route::get('tai-khoan/cai-dat-hien-thi', [TaiKhoanController::class, 'caiDatHienThi'])->name('taikhoan.caiDatHienThi');
Route::get('tai-khoan/bac', [TaiKhoanController::class, 'bac'])->name('taikhoan.bac');
Route::get('tai-khoan/danh-sach-thanh-vien', [TaiKhoanController::class, 'danhSachThanhVien'])->name('taikhoan.danhSachThanhVien');
Route::get('tai-khoan/lich-su-da-dang-ky', [TaiKhoanController::class, 'lichSuDangKyThanhVien'])->name('taikhoan.lichSuDangKyThanhVien');
Route::get('tai-khoan/muc-tieu-cai-dat', [TaiKhoanController::class, 'caiDatMucTieu'])->name('taikhoan.caiDatMucTieu');
Route::get('tai-khoan/lich-su-muc-tieu', [TaiKhoanController::class, 'lichSuMucTieu'])->name('taikhoan.lichSuMucTieu');
Route::get('tai-khoan/danh-sach-chan-comment', [TaiKhoanController::class, 'danhSachChanComment'])->name('taikhoan.danhSachChanComment');
Route::get('tai-khoan/thong-tin-vi', [TaiKhoanController::class, 'thongTinVi'])->name('taikhoan.thongTinVi');
Route::get('tai-khoan/lich-su-giao-dich', [TaiKhoanController::class, 'lichSuGiaoDich'])->name('taikhoan.lichSuGiaoDich');
Route::get('tai-khoan/link-pay', [TaiKhoanController::class, 'linkPay'])->name('taikhoan.linkPay');
Route::get('tai-khoan/trang-chu-player', [TaiKhoanController::class, 'trangChuPlayer'])->name('taikhoan.trangChuPlayer');
Route::get('tai-khoan/khach-hang-than-thiet', [TaiKhoanController::class, 'khachHangThanThiet'])->name('taikhoan.khachHangThanThiet');
Route::get('tai-khoan/cai-dat-player-url', [TaiKhoanController::class, 'caiDatPlayerUrl'])->name('taikhoan.caiDatPlayerUrl');
Route::get('tai-khoan/thong-tin-player', [TaiKhoanController::class, 'thongTinPlayer'])->name('taikhoan.thongTinPlayer');
Route::get('tai-khoan/album-player', [TaiKhoanController::class, 'albumPlayer'])->name('taikhoan.albumPlayer');
Route::get('tai-khoan/cai-dat-duo', [TaiKhoanController::class, 'caiDatDuo'])->name('taikhoan.caiDatDuo');
Route::get('tai-khoan/cai-dat-khac', [TaiKhoanController::class, 'caiDatKhac'])->name('taikhoan.caiDatKhac');
Route::get('tai-khoan/lich-su-duo-player', [TaiKhoanController::class, 'lichSuDuoPlayer'])->name('taikhoan.lichSuDuoPlayer');
Route::get('tai-khoan/lich-su-donate-player', [TaiKhoanController::class, 'lichSuDonatePlayer'])->name('taikhoan.lichSuDonatePlayer');
Route::get('tai-khoan/danh-sach-chan-user', [TaiKhoanController::class, 'danhSachChanUser'])->name('taikhoan.danhSachChanUser');
Route::get('tai-khoan/huong-dan-player', [TaiKhoanController::class, 'huongDanPlayer'])->name('taikhoan.huongDanPlayer');
Route::get('tai-khoan/player-donate', [TaiKhoanController::class, 'donateCaiDat'])->name('taikhoan.donateCaiDat');
Route::get('/dangtins', [DangTinController::class, 'index'])->name('dangtins.index');