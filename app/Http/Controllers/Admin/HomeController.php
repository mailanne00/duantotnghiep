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

         return view('admin.index', compact('taiKhoan', 'countPhanQuyen1', 'countPhanQuyen2', 'countRent', 'totalProfit'));
     }
}
