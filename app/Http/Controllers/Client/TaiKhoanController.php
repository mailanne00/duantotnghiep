<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $taiKhoans = TaiKhoan::all();
        return view('client.tai-khoan.index', compact('taiKhoans'));
    }
}
