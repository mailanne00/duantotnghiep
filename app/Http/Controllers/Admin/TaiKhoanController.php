<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiTheoDoi;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{

    public function index(Request $request)
{
    // Lấy các tham số từ request
    $gioiTinh = $request->input('gioi_tinh');
    $giaTienMin = $request->input('gia_tien_min');
    $giaTienMax = $request->input('gia_tien_max');

    // Query danh sách tài khoản với điều kiện lọc
    $taiKhoans = TaiKhoan::query();

    // Lọc theo giới tính
    if (!empty($gioiTinh)) {
        $taiKhoans->where('gioi_tinh', $gioiTinh);
    }

    // Lọc theo giá tiền tối thiểu
    if (!empty($giaTienMin)) {
        $taiKhoans->where('so_du', '>=', $giaTienMin);
    }

    // Lọc theo giá tiền tối đa
    if (!empty($giaTienMax)) {
        $taiKhoans->where('so_du', '<=', $giaTienMax);
    }

    // Lấy danh sách sau khi áp dụng bộ lọc
    $taiKhoans = $taiKhoans->get();

    // Trả về view cùng với dữ liệu đã lọc
    return view('admin.tai-khoan.index', compact('taiKhoans'));
}


    public function create()
    {
    }

    public function show(int $id)
    {
        $taiKhoan = TaiKhoan::query()->findOrFail($id);
        $a = [];
        $date = [1];
        $soNguoiTheoDois = NguoiTheoDoi::query()->where('nguoi_duoc_theo_doi_id', $id)->orderBy('created_at', 'asc')->get();
        foreach ($soNguoiTheoDois as $soNguoiTheoDoi) {
            $flag = false;
            $c = explode(' ', $soNguoiTheoDoi->created_at);
            $c = $c[0];
            $newDate = new \DateTime($c.' '. '24:59:59');
            foreach ($date as $day) {
                if ($day == $c) {
                    $flag = true;
                }
            }

            $date[] = $c;
            if ($flag===false) {
                $b = NguoiTheoDoi::query()->where('created_at', '<=', $newDate)->get()->count();
                $a[] = [
                    'date' => $c,
                    'follower'=>$b
                ];
            }
        }
        $a = json_encode($a);
        return view('admin.tai-khoan.show', compact('taiKhoan', 'a'));
    }
}
