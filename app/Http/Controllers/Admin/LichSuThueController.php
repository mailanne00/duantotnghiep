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
        ->get()
        ->map(function ($lichSuThue) {
            // Tính toán thời gian kết thúc
            $lichSuThue->thoi_gian_ket_thuc = Carbon::parse($lichSuThue->created_at)->addHours($lichSuThue->gio_thue);
            $lichSuThue->loi_nhuan = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * 0.1;
            return $lichSuThue;
        });

        return view('admin.lich-su-thue.index', compact('lichSuThues'));
    }
}
