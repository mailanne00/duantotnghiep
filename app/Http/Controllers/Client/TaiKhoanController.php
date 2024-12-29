<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use App\Models\DanhMuc;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $taiKhoans = TaiKhoan::all();
        return view('client.tai-khoan.index', compact('taiKhoans'));
    }
    public function show($id){
        {
            // Lấy thông tin của player từ bảng tai_khoans
            $player = TaiKhoan::findOrFail($id);
            $danhmuctaikhoans = DanhMuc::whereIn('id', explode(',', $player->danh_muc_tai_khoans))->get();
            
            // Lấy danh sách đánh giá của player
            $danhGias = DanhGia::where('nguoi_duoc_thue_id', $id)
                ->with('nguoiThue') // Để lấy thông tin người thuê (nguoi_thue_id)
                ->get();
            
            return view('client.tai-khoan.show', compact('player','danhmuctaikhoans', 'danhGias'));
        }
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
