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

        return redirect()->route('admin.binhluans.index')->with('success', 'Cập nhật thành công!');
    }

    public function thongke(Request $request)
    {
        // Lấy các tham số tìm kiếm
        $query = $request->input('query');
        $danhGia = $request->input('danh_gia');
    
        // Lấy danh sách bình luận với phân trang
        $binhLuans = BinhLuan::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('player_id', 'like', '%' . $query . '%');
        })
        ->when($danhGia, function ($queryBuilder) use ($danhGia) {
            return $queryBuilder->where('danh_gia', $danhGia);
        })
        ->paginate(10); // Số bình luận trên mỗi trang
    
        // Nhóm bình luận theo player_id
        $groupedBinhLuans = $binhLuans->groupBy('player_id');
    
        return view('admin.binh-luans.thongke', compact('groupedBinhLuans', 'binhLuans'));
    }
    

    
}
