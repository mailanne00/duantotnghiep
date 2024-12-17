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
        $taiKhoans = TaiKhoan::all()
            ->where('id', '!=', auth()->user()->id)
            ->where('phan_quyen_id', 2);

        return view('client.tai-khoan.index', compact('taiKhoans'));
    }
    public function show($id){
        {
            // Lấy thông tin của player từ bảng tai_khoans
            $player = TaiKhoan::findOrFail($id);
            $selectedCategories = DanhMuc::whereIn('id', explode(',', $player->selected_categories))->get();

            // Lấy danh sách đánh giá của player
            $danhGias = DanhGia::where('nguoi_duoc_thue_id', $id)
                ->with('nguoiThue') // Để lấy thông tin người thuê (nguoi_thue_id)
                ->get();

            return view('client.tai-khoan.show', compact('player','selectedCategories', 'danhGias'));
        }
    }

    public function topDanhGia()
    {
        if(auth()->check()){
            $taiKhoans = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countDanhGia;
                })
                ->where('id', '!=', auth()->user()->id)
                ->where('phan_quyen_id', 2);
        }else{
            $taiKhoans = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countDanhGia;
                })
                ->where('phan_quyen_id', 2);
        }

        return view('client.tai-khoan.index', compact('taiKhoans'));
    }

    public function topHot()
    {
        if (auth()->check()) {
            $taiKhoans = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countRent;
                })
                ->where('id', '!=', auth()->user()->id)
                ->where('phan_quyen_id', 2);
        }else{
            $taiKhoans = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countRent;
                })
                ->where('phan_quyen_id', 2);
        }

        return view('client.tai-khoan.index', compact('taiKhoans'));
    }
}
