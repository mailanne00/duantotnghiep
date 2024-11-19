<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\TaiKhoan;

class HomeController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::all();
        $users = TaiKhoan::where('bi_cam', 0)
            ->where('trang_thai', 1)
            ->whereNotNull('ten')
            ->whereNotNull('ngay_sinh')
            ->whereNotNull('gioi_tinh')
            ->whereNotNull('dia_chi')
            ->whereNotNull('email')
            ->whereNotNull('sdt')
            ->whereNotNull('selected_categories')
            ->whereNotNull('anh_dai_dien')
            ->whereNotNull('biet_danh')
            ->get();



        return view('client.index', compact('danhMucs', 'users'));
    }
    
    
}
