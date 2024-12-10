<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use App\Models\DanhMuc;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index(Request $request)
{
    $gioiTinh = $request->input('gioi_tinh'); // Nhận giá trị lọc từ request
    $taiKhoans = TaiKhoan::query();

    if (!empty($gioiTinh) && in_array($gioiTinh, ['Nam', 'Nữ', 'Khác'])) {
        $taiKhoans->where('gioi_tinh', $gioiTinh);
    }

    $taiKhoans = $taiKhoans->get(); // Thực hiện query

    return view('client.tai-khoan.index', compact('taiKhoans', 'gioiTinh'));
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
