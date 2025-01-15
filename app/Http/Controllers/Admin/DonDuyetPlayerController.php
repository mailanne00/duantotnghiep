<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use Illuminate\Support\Facades\Auth;

class DonDuyetPlayerController extends Controller
{
    public function donDuyetPlayer()
    {
        $user_gui_xac_thucs = TaiKhoan::where('trang_thai_xac_thuc', '0')
            ->where('cccd', '!=', null)
            ->where('personal_video', '!=', null)
            ->where('cccd_so', '!=', null)
            ->get();

        return view('admin.don-duyet-player.index', compact('user_gui_xac_thucs'));
    }

    public function duyetPlayer($id)
    {
        $user = TaiKhoan::where('id', $id)->first();
        if ($user->trang_thai_xac_thuc == 0) {
            $user->update(['trang_thai_xac_thuc' => 1]);

            $thongBao = ThongBao::create([
                'nguoi_gui_id' => Auth::id(),
                'noi_dung' => 'đã xác thực căn cước cho bạn',
                'tai_khoan_id' => $user->id
            ]);

            return redirect()->route('admin.donDuyetPlayer')->with(['success' => 'Xác thực thành công']);
        }


        return redirect()->route('admin.donDuyetPlayer')->with(['error' => 'Đã xảy ra lỗi khi thao tác']);
    }

    public function huyDuyetPlayer($id)
    {
        $user = TaiKhoan::where('id', $id)->first();
        if ($user->trang_thai_xac_thuc == 0) {
            $user->update(['trang_thai_xac_thuc' => 2]);

            $thongBao = ThongBao::create([
                'nguoi_gui_id' => Auth::id(),
                'noi_dung' => 'đã từ chối xác nhận căn cước cho bạn',
                'tai_khoan_id' => $user->id
            ]);


            return redirect()->route('admin.donDuyetPlayer')->with(['success' => 'Bạn đã từ chối xác thực']);
        }

        return redirect()->route('admin.donDuyetPlayer')->with(['error' => 'Đã xảy ra lỗi khi thao tác']);
    }
}
