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
        $gioiTinh = $request->query('gioi_tinh', ''); // Lấy giá trị lọc từ query string
        $gia = $request->query('gia', ''); // Lấy giá trị lọc từ query string
        $taiKhoans = TaiKhoan::query();
    
        if (!empty($gioiTinh) && in_array($gioiTinh, ['Nam', 'Nữ', 'Khác'])) {
            $taiKhoans->where('gioi_tinh', $gioiTinh);

        }
        if (!empty($gia) && in_array($gia, ['0-100.000', '100.000-300.000', '300.000-500.000', '>500.000'])) {
            // Phân tích chuỗi giá trị để lấy min và max
            if (str_contains($gia, '-')) {
                [$min, $max] = explode('-', $gia);
                $min = str_replace('.', '', $min); // Loại bỏ dấu chấm trong chuỗi
                $max = str_replace('.', '', $max);
                
                // Áp dụng điều kiện lọc trong khoảng min và max
                $taiKhoans->whereBetween('gia_tien', [(int)$min, (int)$max]);
            } else if ($gia === '>500.000') {
                // Kiểm tra giá trị lớn hơn 500.000
                $taiKhoans->where('gia_tien', '>', 500000);
            }
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
