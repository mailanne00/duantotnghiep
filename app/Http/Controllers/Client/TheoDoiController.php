<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\NguoiTheoDoi;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use Illuminate\Http\Request;

class TheoDoiController extends Controller
{
    public function store(Request $request)
    {
        
        NguoiTheoDoi::create([
            'nguoi_theo_doi_id' => auth()->id(),
            'nguoi_duoc_theo_doi_id' => $request->nguoi_duoc_theo_doi_id,
        ]);
        
        $taiKhoan = TaiKhoan::where('id', $request->nguoi_duoc_theo_doi_id)->first();

        ThongBao::create([
            'nguoi_gui_id' => auth()->id(),
            'tai_khoan_id' => $taiKhoan->id, 
            'noi_dung' => 'đã theo dõi bạn',
        ]);

        return back()->with('success', 'Đã theo dõi người dùng.');
    }

    public function destroy(Request $request, $id)
    {
        $huyTheoDoi = NguoiTheoDoi::query()->findOrFail($id)
        ->where('nguoi_theo_doi_id', auth()->id())
        ->where('nguoi_duoc_theo_doi_id', $request->nguoi_duoc_theo_doi_id);
        $huyTheoDoi->delete();

        return back()->with('success', 'Đã hủy theo dõi người dùng.');
    }
}
