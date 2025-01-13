<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class HomeController extends Controller
{
    public function index()
    {
        $taiKhoan = TaiKhoan::all();
        $countPhanQuyen1 = TaiKhoan::where('phan_quyen_id', 1)->count();
        $countPhanQuyen2 = TaiKhoan::where('phan_quyen_id', 2)->count();
        $countRent = LichSuThue::where('trang_thai', 1)->count();
        $totalProfit = LichSuThue::all()->sum(function ($lichSuThue) {
            return ($lichSuThue->gio_thue * $lichSuThue->gia_thue * $lichSuThue->nguoiDuocThue->loi_nhuan) / 100;
        });


        $topPlayers = LichSuThue::select('nguoi_duoc_thue', LichSuThue::raw('COUNT(*) as total_rents'))
            ->groupBy('nguoi_duoc_thue')
            ->orderBy('total_rents', 'desc')
            ->with('nguoiDuocThue')
            ->limit(10)
            ->get();
        $chartData = $topPlayers->map(function ($player) {
            return [
                'name' => $player->nguoiDuocThue->ten ?? 'Không xác định',
                'count' => $player->total_rents,
            ];
        })->toArray();

        $year = $request->year ?? now()->year;

        $rentStatusByMonth = LichSuThue::select(
            LichSuThue::raw('MONTH(created_at) as month'),
            'trang_thai',
            LichSuThue::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', $year)
            ->groupBy('month', 'trang_thai')
            ->get();
        $rentData = [];
        foreach ($rentStatusByMonth as $item) {
            $month = $item->month;
            $status = $item->trang_thai;
            $rentData[$month][$status] = $item->total;
        }
        for ($i = 1; $i <= 12; $i++) {
            $rentData[$i] = [
                0 => $rentData[$i][0] ?? 0,
                1 => $rentData[$i][1] ?? 0,
                2 => $rentData[$i][2] ?? 0,
            ];
        }
        ksort($rentData);

        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $lichSuThue = LichSuThue::all();
        $totalProfitByMonth = $lichSuThue->groupBy(function ($item) {
            return $item->created_at->format('m'); // Nhóm theo tháng
        })->map(function ($group) {
            return $group->sum(function ($lichSuThue) {
                return ($lichSuThue->gio_thue * $lichSuThue->gia_thue * $lichSuThue->nguoiDuocThue->loi_nhuan) / 100;
            });
        });
        $a = [];
        foreach ($months as $month) {
            $flag = 0;
            foreach ($totalProfitByMonth as $item => $value) {
                if ($item == $month) {
                    $flag = 1;
                    $a[] = [
                        'y' => $month,
                        'a' => $value
                    ];
                    break;
                }
            }
            if ($flag == 0) {
                $a[] = [
                    'y' => $month,
                    'a' => 0
                ];
            }
        }
        $dataForChart  = json_encode($a);
        $taiKhoanMoi = TaiKhoan::query()
            ->selectRaw('MONTH(created_at) as thang, COUNT(*) as so_luong')
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('thang')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->thang => $item->so_luong];
            });

        $taiKhoanMoi = TaiKhoan::query()
            ->selectRaw('MONTH(created_at) as thang, COUNT(*) as so_luong')
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('thang')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->thang => $item->so_luong];
            });

        $taiKhoanMoiDayDu = collect(range(1, 12))->mapWithKeys(function ($month) use ($taiKhoanMoi) {
            return [$month => $taiKhoanMoi->get($month, 0)];
        });

        $data = $taiKhoanMoiDayDu->map(function ($soLuong, $thang) {
            return [
                'y' => 'Tháng ' . $thang,
                'b' => $soLuong,
            ];
        })->values();

        return view('admin.index', compact('taiKhoan', 'countPhanQuyen1', 'countPhanQuyen2', 'countRent', 'totalProfit', 'chartData', 'rentData', 'dataForChart', 'data'));
    }
}
