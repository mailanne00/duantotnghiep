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

    public function topDanhGia()
    {
        $taiKhoans = TaiKhoan::all()
            ->sortByDesc(function ($taiKhoan) {
                return $taiKhoan->countDanhGia;
            });

        return view('client.tai-khoan.index', compact('taiKhoans'));
    }

    public function topHot()
    {
        $taiKhoans = TaiKhoan::all()
            ->sortByDesc(function ($taiKhoan) {
                return $taiKhoan->countRent;
            });

        return view('client.tai-khoan.index', compact('taiKhoans'));
    }
}
