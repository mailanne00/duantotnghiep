<?php

namespace App\Http\Controllers;

use App\Models\LichSuNap;
use Illuminate\Http\Request;

class DoanhThuController extends Controller
{
    public function index()
    {
        $arr = '';
        $arrTongTien = [];
        $tongSoTien = LichSuNap::query()->select('so_tien')->get();
        for ($i = 1; $i <= 12; $i++) {
            $tongTienThang1 = LichSuNap::query()->where('created_at', '>', date('Y').'-'.$i.'-01')->where('created_at', '<', date('Y').'-'. $i+1 .'-01')->sum('so_tien');
            $arrTongTien[] = $tongTienThang1;
        }
        foreach ($arrTongTien as $key => $value) {
            $key != 0 ? $arr .=  ', '.$value : $arr .= $value;
        }

        return view('admin.doanh-thus.index', compact('arr'));
    }
}
