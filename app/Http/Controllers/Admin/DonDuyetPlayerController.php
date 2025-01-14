<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use Illuminate\Http\Request;

class DonDuyetPlayerController extends Controller
{
    public function donDuyetPlayer()
    {
        $user_gui_xac_thucs = TaiKhoan::where('trang_thai_xac_thuc', '0')
            ->where('cccd', '!=', null)
            ->where('personal_video', '!=', null)
            ->get();

        return view('admin.don-duyet-player.index', compact('user_gui_xac_thucs'));
    }

    public function duyetPlayer($id)
    {
        $user = TaiKhoan::where('id', $id)->first();
        if ($user->trang_thai_xac_thuc == 0) {
            $user->update(['trang_thai_xac_thuc' => 1]);

            $thongBao = ThongBao::create([
                'tieu_de' => 'Xác thực thành công',
                'noi_dung' => 'Người dùng ' . $user->ten . ' đã được xác thực thành công',
                'tai_khoan_id' => $user->id
            ]);
        }


        return redirect()->route('admin.donDuyetPlayer')->with(['success' => 'Bạn đã xác thực thành công']);
    }

    public function huyDuyetPlayer($id)
    {
        $user = TaiKhoan::where('id', $id)->first();
        if ($user->trang_thai_xac_thuc == 0) {
            $user->update(['trang_thai_xac_thuc' => 2]);

            $thongBao = ThongBao::create([
                'tieu_de' => 'Xác thực thất bại',
                'noi_dung' => 'Người dùng ' . $user->ten . ' đã được xác thực thất bại',
                'tai_khoan_id' => $user->id
            ]);
        }

        return redirect()->route('admin.donDuyetPlayer')->with(['success' => 'Bạn đã từ chối xác thực']);
    }
}
