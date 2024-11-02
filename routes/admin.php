<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TaiKhoanController;
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
    return view('admin.layouts.app');
});

Route::resource('players', PlayerController::class);



//taikhoan
Route::get('/taikhoans', [TaiKhoanController::class, 'index'])->name('taikhoans.index');
Route::get('/taikhoans/create', [TaiKhoanController::class, 'create'])->name('taikhoans.create');
Route::post('/taikhoans/store', [TaiKhoanController::class, 'store'])->name('taikhoans.store');
Route::get('/taikhoans/show/{id}', [TaiKhoanController::class, 'show'])->name('taikhoans.show');
Route::post('/taikhoans/ban/{id}', [TaiKhoanController::class, 'banUser'])->name('taikhoans.ban');
Route::post('/taikhoans/unban/{id}', [TaiKhoanController::class, 'unbanUser'])->name('taikhoans.unban');
