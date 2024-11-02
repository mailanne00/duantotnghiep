<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\Player;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index()
    {
        $binhluans = BinhLuan::all();
        $taikhoan = TaiKhoan::all();
        $player = Player::all();

        return view('admin.binh-luans.index', compact('binhluans', 'taikhoan', 'player'));
    }

    public function updateStatus(Request $request, $id)
    {
        $binhluan = BinhLuan::findOrFail($id);
        $trang_thai = $request->input('trang_thai') ? 1 : 0;
        $binhluan->trang_thai = $trang_thai;
        $binhluan->save();
abc
        return redirect()->route('admin.binhluans.index')->with('success', 'Cập nhật thành công!');
    }
}
