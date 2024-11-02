<?php

namespace App\Http\Controllers;

use App\Models\LichSuThuePlayer;
use App\Models\Player;
use App\Models\TheoDoiPlayer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with(['taiKhoan', 'taiKhoan.phanQuyen'])->orderByDesc('id')->get();
        return view('admin.players.index', compact('players'));
    }

    public function create()
    {
        return view('admin.players.create');
    }

    public function store(Request $request)
    {
    
        return redirect()->route('players.index');
    }

    public function show($id, Request $request)
    {
        // Lấy thông tin player
        $player = Player::findOrFail($id);

        $lichSuThue = LichSuThuePlayer::where('player_id', $id)
            ->where('trang_thai_thue', 'thành công') // Kiểm tra trạng thái thuê
            ->get();

        $tongDoanhThu = $lichSuThue->sum(function ($thue) {
            return $thue->gia_player * $thue->gio_thue; // Tính tổng giá nhân với số giờ thuê
        });

        // Số lượng đơn thuê thành công của player
        $soDonThue = $lichSuThue -> count();

        // Tổng số giờ thuê (cũng cần kiểm tra trạng thái)
        $tongGioThue = $lichSuThue -> sum('gio_thue');

        // Tổng số người theo dõi (cũng cần kiểm tra trạng thái)
        $soNguoiTheoDoi = TheoDoiPlayer::where('player_id', $id)
            ->distinct('tai_khoan_id')
            ->count('tai_khoan_id');

        return view('admin.players.show', compact('player', 'soDonThue', 'tongGioThue', 'soNguoiTheoDoi', 'tongDoanhThu'));
    }
}
