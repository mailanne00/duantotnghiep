<?php

use App\Http\Controllers\DoanhThuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\DangTinController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhuongThucThanhToanController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\ThongKeUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToCaoController;
use App\Http\Controllers\TopPlayerController;

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

Route::get('/to-caos', [ToCaoController::class, 'index'])->name('tocao.index');
Route::delete('/to-caos/{complaint}', [ToCaoController::class, 'destroy'])->name('tocaos.destroy');
Route::patch('/to-caos/{complaint}', [ToCaoController::class, 'updateStatus'])->name('tocao.updateStatus');
Route::get('/to-caos/add', [ToCaoController::class, 'create'])->name('tocao.add');
Route::post('/to-caos/add', [ToCaoController::class, 'store'])->name('tocao.store');
Route::get('/to-caos/{complaint}', [ToCaoController::class, 'show'])->name('tocao.show');


Route::get('/dangtins', [DangTinController::class, 'index'])->name('dangtins.index');
Route::get('/dangtins/create', [DangTinController::class, 'create'])->name('dangtins.create');
Route::post('/dangtins', [DangTinController::class, 'store'])->name('dangtins.store');
Route::delete('/dangtins/{id}', [DangTinController::class, 'store'])->name('dangtins.destroy');

Route::get('/phuongthucthanhtoans', [PhuongThucThanhToanController::class, 'index'])->name('phuongthucthanhtoans.index');
Route::get('/phuongthucthanhtoans/create', [PhuongThucThanhToanController::class, 'create'])->name('phuongthucthanhtoans.create');
Route::post('/phuongthucthanhtoans', [PhuongThucThanhToanController::class, 'store'])->name('phuongthucthanhtoans.store');
Route::get('/phuongthucthanhtoans/{id}/edit', [PhuongThucThanhToanController::class, 'edit'])->name('phuongthucthanhtoans.edit');
Route::put('/phuongthucthanhtoans/{id}', [PhuongThucThanhToanController::class, 'update'])->name('phuongthucthanhtoans.update');
Route::put('/phuongthucthanhtoans/{id}/update-status', [PhuongThucThanhToanController::class, 'updateStatus'])->name('phuongthucthanhtoans.update-status');
Route::delete('/phuongthucthanhtoans/{id}', [PhuongThucThanhToanController::class, 'destroy'])->name('phuongthucthanhtoans.destroy');

// Đăng nhập admin
//Route::get('/', [AdminController::class, 'trangChu'])->name('index');
Route::get('/', [AdminController::class, 'index'])->name('dangnhap.index');
Route::post('dang-nhap', [AdminController::class, 'dangNhap'])->name('dangnhap.submit');

// Quản lí player
Route::get('players/yeu-cau-duyet', [PlayerController::class, 'yeuCau'])->name('players.yeucauduyet');
Route::post('/players/update-status/{id}', [PlayerController::class, 'chapNhan'])->name('players.updateStatus');

Route::resource('players', PlayerController::class);


Route::get('/bieu-do-duong/{id}', [PlayerController::class, 'bieudo'])->name('players.bieudoduong');
Route::get('/lich-su-duo/{id}', [PlayerController::class, 'showlichsu'])->name('players.showlichsu');

Route::get('doanh-thus', [DoanhThuController::class, 'index'])->name('doanhthus.index');

//taikhoan
Route::get('/taikhoans', [TaiKhoanController::class, 'index'])->name('taikhoans.index');
Route::get('/taikhoans/create', [TaiKhoanController::class, 'create'])->name('taikhoans.create');
Route::post('/taikhoans/store', [TaiKhoanController::class, 'store'])->name('taikhoans.store');
Route::get('/taikhoans/{id}', [TaiKhoanController::class, 'show'])->name('taikhoans.show');
Route::post('/taikhoans/ban/{id}', [TaiKhoanController::class, 'banUser'])->name('taikhoans.ban');
Route::post('/taikhoans/unban/{id}', [TaiKhoanController::class, 'unbanUser'])->name('taikhoans.unban');
//Quản lí nạp tiền
Route::resource('quan-li-nap-tiens', \App\Http\Controllers\LichSuNapController::class);
Route::get('/danhmucs', [DanhMucController::class, 'index'])->name('danhmucs.index');
Route::get('/danhmucs/create', [DanhMucController::class, 'create'])->name('danhmucs.create');
Route::post('/danhmucs/store', [DanhMucController::class, 'store'])->name('danhmucs.store');
Route::get('/danhmucs/{id}/edit', [DanhMucController::class, 'edit'])->name('danhmucs.edit');
Route::put('/danhmucs/{id}', [DanhMucController::class, 'update'])->name('danhmucs.update');
Route::put('/danhmucs/{id}/update-status', [DanhMucController::class, 'updateStatus'])->name('danhmucs.update-status');
Route::delete('/danhmucs/{id}', [DanhMucController::class, 'destroy'])->name('danhmucs.destroy');


Route::get('/binhluans', [BinhLuanController::class, 'index'])->name('binhluans.index');
Route::get('/binhluans/create', [BinhLuanController::class, 'create'])->name('binhluans.create');
Route::post('/binhluans/store', [BinhLuanController::class, 'store'])->name('binhluans.store');
Route::get('/binhluans/{id}/edit', [BinhLuanController::class, 'edit'])->name('binhluans.edit');
Route::put('/binhluans/{id}', [BinhLuanController::class, 'update'])->name('binhluans.update');
Route::put('/binhluans/{id}/update-status', [BinhLuanController::class, 'updateStatus'])->name('binhluans.update-status');
Route::delete('/binhluans/{id}', [BinhLuanController::class, 'destroy'])->name('binhluans.destroy');


//top-player
Route::get('/top-followed-players', [TopPlayerController::class, 'getTopFollowedPlayers'])->name('top_followed_players');



// Thống kê player được theo dõi và thuê nhiều nhất
Route::get('/top-players/index', [TopPlayerController::class, 'index'])->name('top-players.index');



Route::get('/binhluans/thongke', [BinhLuanController::class, 'thongke'])->name('binhluans.thongke');

Route::get('/phan-quyens', [PhanQuyenController::class, 'index'])->name('phanquyen.index');
Route::get('/phan-quyens/create', [PhanQuyenController::class, 'create'])->name('phanquyen.create');
Route::post('/phan-quyens/store', [PhanQuyenController::class, 'store'])->name('phanquyen.store');
Route::get('/phan-quyens/edit/{id}', [PhanQuyenController::class, 'edit'])->name('phanquyen.edit');
Route::put('/phan-quyens/update/{id}', [PhanQuyenController::class, 'update'])->name('phanquyen.update');
Route::delete('/phan-quyens/{id}', [PhanQuyenController::class, 'destroy'])->name('phanquyen.destroy');

Route::get('doanh-thus', [DoanhThuController::class, 'index'])->name('doanhthu.index');
Route::get('/tk-users', [ThongKeUserController::class, 'index'])->name('tkuser.index');
Route::get('/tk-users/data', [ThongKeUserController::class, 'getStatisticsData'])->name('tkuser.data');
