<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\DanhMucTaiKhoan;
use App\Models\TaiKhoan;

class DanhmucController extends Controller
{
    public function index()
    {

        $danhMucss = Danhmuc::all();
        return view('client.danh-muc.index', compact( 'danhMucss'));
    }
    public function show(int $id)
    {
        $danhMuc = DanhMuc::query()->findOrFail($id);
        $taiKhoans = DanhMucTaiKhoan::query()->where('danh_muc_id', $id)->get();

        return view('client.danh-muc.show', compact('danhMuc', 'taiKhoans'));
    }
}
