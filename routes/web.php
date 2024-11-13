<?php

use App\Http\Controllers\Client\ChinhSachController;
use App\Http\Controllers\Client\PlayerController;
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

//Player
Route::get('/players/index',[PlayerController::class,'index'])->name('players.index');
Route::get('/players/show',[PlayerController::class,'show'])->name('players.show');
//Chính sách
Route::get('/chinhsachs', [ChinhSachController::class, 'chinhSach'])->name('chinhsachs.index');