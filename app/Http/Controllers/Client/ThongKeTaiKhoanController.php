<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChanChat;
use App\Models\NguoiTheoDoi;
use Illuminate\Support\Facades\Auth;

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

        }else {
            $nguoiTheoDoi = null;
            $nguoiDuocTheoDoi = null;
            $listNguoiDuocTheoDoiIds = [];
            $nguoiBiChan= null;
        }

        return view('client.thong-ke-tai-khoan.index', compact('nguoiTheoDoi', 'nguoiDuocTheoDoi','nguoiBiChan', 'listNguoiDuocTheoDoiIds'));
    }
}
