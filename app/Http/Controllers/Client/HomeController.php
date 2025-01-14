<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class HomeController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::all();

        if (auth()->check()) {
            $userDaThues = LichSuThue::where("nguoi_thue", Auth::id())
                ->where('trang_thai', 1)
                ->take(10)
                ->get()
                ->unique('nguoi_duoc_thue');
        } else {
            $userDaThues = null;
        }

        if (!auth()->check()) {
            $taiKhoans = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countDanhGia;
                })
                ->where('phan_quyen_id', 2)
                ->where('trang_thai_xac_thuc', 1)
                ->take(10);

            $taiKhoans2 = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countRent;
                })
                ->where('trang_thai_xac_thuc', 1)
                ->where('phan_quyen_id', 2)
                ->take(10);
        } else {
            $taiKhoans = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countDanhGia;
                })
                ->where('id', '!=', auth()->user()->id)
                ->where('phan_quyen_id', 2)
                ->where('trang_thai_xac_thuc', 1)
                ->take(10);

            $taiKhoans2 = TaiKhoan::all()
                ->sortByDesc(function ($taiKhoan) {
                    return $taiKhoan->countRent;
                })
                ->where('id', '!=', auth()->user()->id)
                ->where('trang_thai_xac_thuc', 1)
                ->where('phan_quyen_id', 2)
                ->take(10);
        }

        $taiKhoanDaiGias = TaiKhoan::all()
            ->filter(function ($taiKhoanDaiGia) {
                return $taiKhoanDaiGia->daiGia['24h'] > 0 || $taiKhoanDaiGia->daiGia['week'] > 0 || $taiKhoanDaiGia->daiGia['month'] > 0;
            })
            ->sortByDesc(function ($taiKhoanDaiGia) {
                return $taiKhoanDaiGia->daiGia;
            })
            ->where('phan_quyen_id', 2)
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

    public function thongBao(Request $request)
    {
        $token = $request->header('authorization');
        $user = TaiKhoan::find(explode(' ', $token)[1]);
        Auth::login($user);
        $thongBaos = ThongBao::where('tai_khoan_id', Auth::id())->with('nguoiGui')->latest('id')->get();
        Carbon::setLocale('vi');
        foreach ($thongBaos as $thongBao) {
            $difference = Carbon::parse($thongBao->created_at)->diffForHumans(Carbon::now(), true);
            $thongBao['cach_day'] = $difference;
        }

        return response()->json($thongBaos);
    }

    public function docThongBao(Request $request) {
        $token = $request->header('authorization');
        $user = TaiKhoan::find(explode(' ', $token)[1]);
        Auth::login($user);
        $thongBaos = ThongBao::where('tai_khoan_id', Auth::id())->where('da_doc', 0)->update([
            'da_doc' => true
        ]);

        return response()->json(['success' => 'Cập nhật thành công'
        ]);
    }
}
