<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChanChat;
use App\Models\LichSuNap;
use App\Models\LichSuThue;
use App\Models\NguoiTheoDoi;
use App\Models\YeuCauRutTien;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThongKeTaiKhoanController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $nguoiTheoDoi = NguoiTheoDoi::with('nguoiTheoDoi')
                ->where('nguoi_duoc_theo_doi_id', Auth::id())
                ->get();

            $nguoiDuocTheoDoi = NguoiTheoDoi::with('nguoiTheoDoi')
                ->where('nguoi_theo_doi_id', Auth::id())
                ->get();

            $nguoiBiChan = ChanChat::with('nguoiBiChan')
                ->where('nguoi_chan', Auth::id())
                ->get();

            $listNguoiDuocTheoDoiIds = $nguoiDuocTheoDoi->pluck('nguoi_duoc_theo_doi_id')->toArray();

            $khthanthiet = LichSuThue::select('nguoi_thue', DB::raw('SUM(gio_thue) as total_hour'))
            ->with('nguoiThue')  // Eager load thông tin người thuê
            ->where('nguoi_duoc_thue', Auth::id())  // Chỉ lấy các bản ghi mà nguoi_duoc_thue là người dùng hiện tại
            ->where('trang_thai', 1)  // Chỉ lấy các bản ghi có trạng thái là 1 (đã kết thúc)
            ->groupBy('nguoi_thue')  // Nhóm theo nguoi_thue để tính tổng số giờ cho từng người thuê
            ->orderByDesc(DB::raw('SUM(gio_thue)'))  // Sắp xếp theo tổng số giờ thuê giảm dần
            ->get();

            $lichSuNaps = LichSuNap::where('tai_khoan_id', Auth::id())
                ->get(); 

                $yeuCauRutTiens = YeuCauRutTien::where('tai_khoan_id', Auth::id())
                ->get(); 


        } else {
            $nguoiTheoDoi = null;
            $nguoiDuocTheoDoi = null;
            $listNguoiDuocTheoDoiIds = [];
            $nguoiBiChan = null;
        }

        // dd($khthanthiet);

        return view('client.thong-ke-tai-khoan.index', compact('yeuCauRutTiens','nguoiTheoDoi', 'nguoiDuocTheoDoi', 'nguoiBiChan','lichSuNaps', 'listNguoiDuocTheoDoiIds', 'khthanthiet'));
    }

    public function layDoanhThuNgay()
    {
        $currentMonth = Carbon::now()->month; // Tháng hiện tại
        $currentYear = Carbon::now()->year;  // Năm hiện tại

        // Lọc các bản ghi theo người được thuê, trạng thái và tháng năm hiện tại
        $lichSuThues = LichSuThue::where("nguoi_duoc_thue", auth()->user()->id)
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

    public function layDoanhThuThang()
    {
        $currentYear = Carbon::now()->year;  // Năm hiện tại

        // Lọc các bản ghi theo người được thuê, trạng thái và tháng năm hiện tại
        $lichSuThues = LichSuThue::where("nguoi_duoc_thue", auth()->user()->id)
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
}
