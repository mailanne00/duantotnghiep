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

         $rentStatusByMonth = LichSuThue::select(
             LichSuThue::raw('MONTH(created_at) as month'), 'trang_thai',
             LichSuThue::raw('COUNT(*) as total')
         )
             ->whereYear('created_at', now()->year)
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

         return view('admin.index', compact('taiKhoan', 'countPhanQuyen1', 'countPhanQuyen2', 'countRent', 'totalProfit', 'chartData','rentData'));
     }
}
