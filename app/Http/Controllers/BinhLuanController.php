<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\Player;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index(Request $request)
    {
        $binhluans = BinhLuan::all();
        $taikhoan = TaiKhoan::all();
        $player = Player::all();

        $query = BinhLuan::with('player');

        // Tìm kiếm theo player_id hoặc số sao
        if ($request->has('query')) {
            $query->where('player_id', $request->query);
        }
        if ($request->has('danh_gia')) {
            $query->where('danh_gia', $request->danh_gia);
        }

        // Phân trang kết quả
        $binhLuans = $query->paginate(10);

        return view('admin.binh-luans.index', compact('binhluans', 'taikhoan', 'player'));
    }

    public function updateStatus(Request $request, $id)
    {
        $binhluan = BinhLuan::findOrFail($id);
        $trang_thai = $request->input('trang_thai') ? 1 : 0;
        $binhluan->trang_thai = $trang_thai;
        $binhluan->save();

        return redirect()->route('admin.binhluans.index')->with('success', 'Cập nhật thành công!');
    }

    
}
