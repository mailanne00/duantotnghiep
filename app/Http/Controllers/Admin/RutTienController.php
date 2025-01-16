<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use App\Models\YeuCauRutTien;
use Illuminate\Http\Request;

class RutTienController extends Controller
{
    public function index()
    {
        $yeuCauRutTiens = YeuCauRutTien::with('nguoiRut')->where('xet_duyet', 1)->get(); 
        return view('admin.rut-tien.index', compact('yeuCauRutTiens'));
    }

    public function Accept(Request $request, $id)
    {
        $yeuCauRutTien = YeuCauRutTien::findOrFail($id);

        if($yeuCauRutTien->trang_thai == 0)
        {
            $yeuCauRutTien->markAsProcessing();

            ThongBao::create([
                'nguoi_gui_id' => auth()->id(),
                'tai_khoan_id' => $yeuCauRutTien->tai_khoan_id,
                'noi_dung' => 'đã hoàn thành đơn rút tiền cho bạn',
            ]);

            return redirect()->back()->with('success', 'Đã thanh toán thành công.');
        }
        return redirect()->back()->with('error', 'Không thể thanh toán.');
    }

    public function Cancel(Request $request, $id)
    {   
        $yeuCauRutTien = YeuCauRutTien::findOrFail($id);

        $taiKhoan = TaiKhoan::where('id', $yeuCauRutTien->tai_khoan_id)->first();

        if($yeuCauRutTien->trang_thai == 0)
        {
            $yeuCauRutTien->markAsCancelled();

            ThongBao::create([
                'nguoi_gui_id' => auth()->id(),
                'tai_khoan_id' => $yeuCauRutTien->tai_khoan_id,
                'noi_dung' => 'đã từ chối đơn rút tiền cho bạn',
            ]);

            $taiKhoan->so_du = $taiKhoan->so_du + $yeuCauRutTien->so_tien;
            $taiKhoan->save();

            return redirect()->back()->with('success', 'Đã từ chối thanh toán.');
        }
        return redirect()->back()->with('error', 'Không thể từ chối thanh toán.');
    }
}
