<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChanChat;
use App\Models\NguoiTheoDoi;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThongKeTaiKhoanController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $nguoiTheoDoi = NguoiTheoDoi::with('nguoiTheoDoi')
                ->where('nguoi_duoc_theo_doi_id', Auth::id())
                ->get();
        }else {
            $nguoiTheoDoi= null;
        }

        if (auth()->check()) {
            $nguoiBiChan = ChanChat::with('nguoiBiChan')
                ->where('nguoi_chan', Auth::id())
                ->get();
        }else {
            $nguoiBiChan= null;
        }

        if (auth()->check()) {
            $nguoiBiChan = ChanChat::with('nguoiBiChan')
                ->where('nguoi_chan', Auth::id())
                ->get();
        }else {
            $nguoiBiChan= null;
        }

        return view('client.thong-ke-tai-khoan.index', compact('nguoiTheoDoi', 'nguoiBiChan'));
    }
}
