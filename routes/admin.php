<?php

use App\Http\Controllers\PlayerController;
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
//Quản lí nạp tiền
Route::resource('quan-li-nap-tiens', \App\Http\Controllers\LichSuNapController::class);
