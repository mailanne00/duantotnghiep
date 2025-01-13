<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class DonDuyetPlayerController extends Controller
{
    public function donDuyetPlayer()
    {
        $user_gui_xac_thucs = TaiKhoan::where('trang_thai_xac_thuc', '0')
            ->where('cccd', '!=', null)
            ->get();

        return view('admin.don-duyet-player.index', compact('user_gui_xac_thucs'));
    }

    public function duyetPlayer($id)
    {
        $user = TaiKhoan::where('id', $id)->first()
        ->update(['trang_thai' => '1']);

        return view('admin.don-duyet-player.index', compact('user_gui_xac_thucs'));
    }
}
