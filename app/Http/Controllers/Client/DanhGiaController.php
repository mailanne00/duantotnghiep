<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    // Hiển thị các đánh giá cho người dùng hoặc player
    public function index(int $playerId)
    {
        // Lấy thông tin của player từ bảng tai_khoans
        $player = TaiKhoan::findOrFail($playerId);

        // Lấy danh sách đánh giá của player
        $danhGias = DanhGia::where('nguoi_duoc_thue_id', $playerId)
            ->with('nguoiThue') // Để lấy thông tin người thuê (nguoi_thue_id)
            ->get();

        return view('client.chi-tiet-player.index', compact('player', 'danhGias'));
    }
}
