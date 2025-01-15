<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuThue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LichSuThueController extends Controller
{
    public function index()
    {
        $lichSuThues = LichSuThue::query()
        ->with('danhGia')
        ->get()
        ->map(function ($lichSuThue) {
            // Tính toán thời gian kết thúc
            $lichSuThue->thoi_gian_ket_thuc = Carbon::parse($lichSuThue->created_at)->addHours($lichSuThue->gio_thue);
            $lichSuThue->tien_user_nhan = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (100 - (int)$lichSuThue->loi_nhuan) / 100;
            $lichSuThue->loi_nhuan_don = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (int)$lichSuThue->loi_nhuan / 100;
            return $lichSuThue;
        });

        return view('admin.lich-su-thue.index', compact('lichSuThues'));
    }
}
