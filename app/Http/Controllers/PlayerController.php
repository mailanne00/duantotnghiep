<?php

namespace App\Http\Controllers;

use App\Models\LichSuThuePlayer;
use App\Models\Player;
use App\Models\TheoDoiPlayer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with(['taiKhoan', 'taiKhoan.phanQuyen'])->orderByDesc('id')->get();
        return view('admin.players.index', compact('players'));
    }

    public function bieudo()
    {
        $playerId = 2; // ID của player bạn muốn thống kê

        // Tính tổng số giờ thuê theo từng ngày
        $chartData = LichSuThuePlayer::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(gio_thue) as total_hours')
        )
            ->where('player_id', $playerId)
            ->where('trang_thai_thue', 'success')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($data) {
                return [
                    'date' => $data->date,
                    'total_hours' => $data->total_hours
                ];
            });

        // Tính tổng số tiền kiếm được theo từng ngày
        $chartDataTongTien = LichSuThuePlayer::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(gia_player * gio_thue) as total_earnings') // Tính tổng tiền kiếm được
        )
            ->where('player_id', $playerId)
            ->where('trang_thai_thue', 'success')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($data) {
                return [
                    'date' => $data->date,
                    'total_earnings' => $data->total_earnings
                ];
            });

        // Tạo mảng labels và data từ dữ liệu vừa lấy cho số giờ thuê
        $labels = $chartData->pluck('date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d/m/Y');
        });
        $data = $chartData->pluck('total_hours');

        // Tạo mảng labels và data từ dữ liệu vừa lấy cho tổng số tiền
        $labelsTongTien = $chartDataTongTien->pluck('date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d/m/Y');
        });
        $dataTongTien = $chartDataTongTien->pluck('total_earnings');

        return view('admin.players.bieudoduong', compact('labels', 'data', 'labelsTongTien', 'dataTongTien'));
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
        $soDonThue = $lichSuThue->count();

        // Tổng số giờ thuê (cũng cần kiểm tra trạng thái)
        $tongGioThue = $lichSuThue->sum('gio_thue');

        // Tổng số người theo dõi (cũng cần kiểm tra trạng thái)
        $soNguoiTheoDoi = TheoDoiPlayer::where('player_id', $id)
            ->distinct('tai_khoan_id')
            ->count('tai_khoan_id');

        return view('admin.players.show', compact('player', 'soDonThue', 'tongGioThue', 'soNguoiTheoDoi', 'tongDoanhThu'));
    }
}
