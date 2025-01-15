<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LichSuThueController;
use App\Http\Controllers\Client\TinNhanController;
use App\Http\Controllers\Client\ToCaoController;

// Ensure that the TinNhanController class exists in the specified namespace
// If it does not exist, create the class in the specified namespace

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/tin-nhan', [TinNhanController::class, 'index'])->name('client.tinNhan');
Route::post('/send-message', [TinNhanController::class, 'sendMessage'])->name('client.tinNhan.send');
Route::get('/tin-nhan/{phong_id}', [TinNhanController::class, 'chiTiettinNhan'])->name('client.phongChat');
Route::post('/tao-chat', [TinNhanController::class, 'taoChatMoi'])->name('client.taoChat');
Route::post('/tin-nhan/{phongChatId}/read', [TinNhanController::class, 'markAsRead']);
Route::get('/lich-su-duoc-thue/{id}', [LichSuThueController::class, 'indexApiNguoiDuocThue']);
Route::get('/lich-su-thue/{id}', [LichSuThueController::class, 'indexApiNguoiThue']);
Route::get('thong-bao', [HomeController::class, 'thongBao'])->name('client.thongBao');
Route::get('thong-bao/da-doc', [HomeController::class, 'docThongBao'])->name('client.thongBao');

Route::post('/to-cao', [ToCaoController::class, 'store']);

Route::post('/themDonThueApi', [LichSuThueController::class, 'themDonThueApi'])->name('client.themDonThueApi');
