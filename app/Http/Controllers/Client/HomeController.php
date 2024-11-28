<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Storage;

class HomeController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::all()->take(10);

        if (auth()->check()) {
            $userDaThues = LichSuThue::query()->where("nguoi_thue", Auth::id())
                ->where('trang_thai', 1)
                ->take(10)
                ->get()php ar    ;
        }else {
            $userDaThues= null;
        }

        if (!auth()->check()) {
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
        } else {
            $taiKhoans = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countDanhGia;
                })
                ->where('id', '!=', auth()->user()->id)
                ->take(10);

            $taiKhoans2 = TaiKhoan::all()
            ->sortByDesc(function ($taiKhoan) {
                return $taiKhoan->countRent;
            })
            ->where('id', '!=', auth()->user()->id)
            ->take(10);
        }

        $taiKhoanDaiGias = TaiKhoan::all()
            ->filter(function ($taiKhoanDaiGia) {
                return $taiKhoanDaiGia->daiGia['24h'] > 0 || $taiKhoanDaiGia->daiGia['week'] > 0 || $taiKhoanDaiGia->daiGia['month'] > 0;
            })
            ->sortByDesc(function ($taiKhoanDaiGia) {
                return $taiKhoanDaiGia->daiGia;
            })
            ->take(10);

        return view('client.index', compact('danhMucs', 'userDaThues', 'taiKhoans', 'taiKhoans2', 'taiKhoanDaiGias'));
    }

    public function modalUser($id)
    {
        $user = TaiKhoan::findOrFail($id);  // Tìm người dùng theo ID
        $khach = auth()->user();

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
            'so_du' => $khach->so_du,
            'anh_dai_dien' => Storage::url($user->anh_dai_dien),
        ]);
    }
}



