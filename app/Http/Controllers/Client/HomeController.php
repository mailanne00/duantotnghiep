<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\TaiKhoan;
use Storage;

class HomeController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::all()->take(10);
        $users = TaiKhoan::where('bi_cam', 0)
            ->where('trang_thai', 1)
            ->whereNotNull('ten')
            ->whereNotNull('ngay_sinh')
            ->whereNotNull('gioi_tinh')
            ->whereNotNull('dia_chi')
            ->whereNotNull('email')
            ->whereNotNull('sdt')
            ->whereNotNull('gia_tien')
            ->whereNotNull('selected_categories')
            ->whereNotNull('anh_dai_dien')
            ->whereNotNull('biet_danh')
            ->get();

        $taiKhoans = TaiKhoan::all()
            ->sortByDesc(function ($taiKhoan) {
            return $taiKhoan->countDanhGia;
        })
        ->take(10);

        $taiKhoans2 = TaiKhoan::all()
            ->sortByDesc(function ($taiKhoan) {
                return $taiKhoan->countRent;
            })
            ->take(10);

        return view('client.index', compact( 'danhMucs','users', 'taiKhoans', 'taiKhoans2'));
    }

    public function modalUser($id)
    {
        $user = TaiKhoan::findOrFail($id);  // Tìm người dùng theo ID

        // Trả về dữ liệu người dùng dưới dạng JSON
        return response()->json([
            'id' => $user->id,
            'ten' => $user->ten,
            'biet_danh' => $user->biet_danh,
            'ngay_sinh' => $user->ngay_sinh,
            'gioi_tinh' => $user->gioi_tinh,
            'dia_chi' => $user->dia_chi,
            'email' => $user->email,
            'sdt' => $user->sdt,
            'gia_tien' => $user->gia_tien,
            'anh_dai_dien' => Storage::url($user->anh_dai_dien),
        ]);
    }
}



