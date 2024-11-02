<?php

use App\Http\Controllers\DangTinController;
use App\Http\Controllers\PhuongThucThanhToanController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToCaoController;
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



Route::get('/to-caos', [ToCaoController::class, 'index'])->name('tocao.index');
Route::delete('/to-caos/{complaint}', [ToCaoController::class, 'destroy'])->name('tocaos.destroy');
Route::patch('/to-caos/{complaint}', [ToCaoController::class, 'updateStatus'])->name('tocao.updateStatus');
Route::get('/to-caos/add', [ToCaoController::class, 'create'])->name('tocao.add');
Route::post('/to-caos/add', [ToCaoController::class, 'store'])->name('tocao.store');
Route::get('/to-caos/{complaint}', [ToCaoController::class, 'show'])->name('tocao.show');


Route::resource('players', PlayerController::class);
Route::get('/bieu-do-duong', [PlayerController::class, 'bieudo'])->name('players.bieudoduong');
