<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuThue;
use App\Models\NguoiTheoDoi;
use App\Models\TaiKhoan;
use Carbon\Carbon;
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
            $newDate = new \DateTime($c . ' ' . '24:59:59');
            foreach ($date as $day) {
                if ($day == $c) {
                    $flag = true;
                }
            }

            $date[] = $c;
            if ($flag === false) {
                $b = NguoiTheoDoi::query()->where('created_at', '<=', $newDate)->get()->count();
                $a[] = [
                    'date' => $c,
                    'follower' => $b
                ];
            }
        }
        $a = json_encode($a);
        return view('admin.tai-khoan.show', compact('taiKhoan', 'a'));
    }

    public function layDoanhThuNgay(int $id)
    {
        $currentMonth = Carbon::now()->month; // Tháng hiện tại
        $currentYear = Carbon::now()->year;  // Năm hiện tại

        // Lọc các bản ghi theo người được thuê, trạng thái và tháng năm hiện tại
        $lichSuThues = LichSuThue::where("nguoi_duoc_thue", $id)
            ->where("trang_thai", 1)
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->orderByDesc("id")
            ->get()
            ->map(function ($lichSuThue) {
                $lichSuThue->thoi_gian_ket_thuc = Carbon::parse($lichSuThue->created_at)->addHours($lichSuThue->gio_thue);
                $lichSuThue->tong_tien_nhan = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * 0.9;
                return $lichSuThue;
            });

        // Số ngày trong tháng hiện tại
        $daysInMonth = Carbon::now()->daysInMonth;

        // Tạo mảng labels từ Ngày 1 đến Ngày cuối cùng của tháng
        $labels = [];
        foreach (range(1, $daysInMonth) as $day) {
            $labels[] = "Ngày $day";
        }

        // Khởi tạo mảng để lưu tổng doanh thu mỗi ngày
        $data = array_fill(0, $daysInMonth, 0); // Mảng bắt đầu với tất cả giá trị là 0

        // Lặp qua các bản ghi và tính tổng doanh thu theo ngày
        foreach ($lichSuThues as $lichSuThue) {
            $day = Carbon::parse($lichSuThue->created_at)->day; // Lấy ngày trong tháng
            $data[$day - 1] += $lichSuThue->tong_tien_nhan;    // Cộng doanh thu vào đúng ngày
        }

        // Trả về response dạng JSON
        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'month' => $currentMonth,
            'year' => $currentYear,
        ]);
    }

    public function layDoanhThuThang(int $id)
    {
        $currentYear = Carbon::now()->year;  // Năm hiện tại

        // Lọc các bản ghi theo người được thuê, trạng thái và tháng năm hiện tại
        $lichSuThues = LichSuThue::where("nguoi_duoc_thue", $id)
            ->where("trang_thai", 1)
            ->whereYear('created_at', $currentYear)
            ->orderByDesc("id")
            ->get()
            ->map(function ($lichSuThue) {
                $lichSuThue->thoi_gian_ket_thuc = Carbon::parse($lichSuThue->created_at)->addHours($lichSuThue->gio_thue);
                $lichSuThue->tong_tien_nhan = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * 0.9;
                return $lichSuThue;
            });


        $labels = [];
        foreach (range(1, 12) as $thang) {
            $labels[] = "Tháng $thang";
        }

        // Khởi tạo mảng để lưu tổng doanh thu mỗi ngày
        $data = array_fill(0, 12, 0); // Mảng bắt đầu với tất cả giá trị là 0

        // Lặp qua các bản ghi và tính tổng doanh thu theo tháng
        foreach ($lichSuThues as $lichSuThue) {
            $month = Carbon::parse($lichSuThue->created_at)->month; // Lấy tháng của bản ghi
            $data[$month - 1] += $lichSuThue->tong_tien_nhan;    // Cộng doanh thu vào đúng tháng
        }

        // Trả về response dạng JSON
        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'year' => $currentYear,
        ]);
    }

    public function layDoanhThuNam(int $id)
    {
        $lichSuThues = LichSuThue::where("nguoi_duoc_thue", $id)
            ->where("trang_thai", 1)
            ->orderByDesc("id")
            ->get()
            ->map(function ($lichSuThue) {
                $lichSuThue->thoi_gian_ket_thuc = Carbon::parse($lichSuThue->created_at)->addHours($lichSuThue->gio_thue);
                $lichSuThue->tong_tien_nhan = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * 0.9;
                return $lichSuThue;
            });

        $years = $lichSuThues->map(function ($lichSuThue) {
            return Carbon::parse($lichSuThue->created_at)->year;
        })->unique()->sort()->values();

        // Tạo mảng doanh thu theo từng năm
        $data = array_fill(0, $years->count(), 0);

        // Lặp qua các bản ghi để tính tổng doanh thu theo từng năm
        foreach ($lichSuThues as $lichSuThue) {
            $year = Carbon::parse($lichSuThue->created_at)->year;
            $index = $years->search($year); // Tìm vị trí của năm trong mảng $years
            $data[$index] += $lichSuThue->tong_tien_nhan;
        }

        // Trả về response dạng JSON
        return response()->json([
            'labels' => $years,
            'data' => $data,
        ]);
    }

}
