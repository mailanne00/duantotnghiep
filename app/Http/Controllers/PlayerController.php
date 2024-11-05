<?php

namespace App\Http\Controllers;

use App\Models\LichSuThuePlayer;
use App\Models\Player;
use App\Models\TheoDoiPlayer;
use App\Models\TaiKhoan;
use App\Models\BinhLuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with(['taiKhoan', 'taiKhoan.phanQuyen'])
            ->where('tinh_trang', 'Duyệt')
            ->orderByDesc('id')
            ->get();
        return view('admin.players.index', compact('players'));
    }

    public function bieudo($playerId)
    {

        $chartDataDay = collect(range(0, 23))->map(function ($hour) use ($playerId): array {
            $rentals = LichSuThuePlayer::with('taiKhoan')
                ->where('player_id', $playerId)
                ->where('trang_thai_thue', 'thành công')
                ->whereDate('created_at', Carbon::today())
                ->whereRaw('HOUR(created_at) = ?', [$hour])
                ->get();

            $totalHour = $rentals->sum('gio_thue');
            $renterNames = $rentals->map(function ($rental) {
                return $rental->taiKhoan->ten ?? 'Không có tên';
            })->unique()->values();



            return [
                'hour' => $hour,
                'total_hour' => $totalHour,
                'renter_names' => $renterNames
            ];
        });

        $chartData = LichSuThuePlayer::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(gio_thue) as total_hours')
        )
            ->where('player_id', $playerId)
            ->where('trang_thai_thue', 'thành công')
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
            ->where('trang_thai_thue', 'thành công')
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

        return view('admin.players.bieudoduong', compact('labels', 'data', 'labelsTongTien', 'dataTongTien', 'chartDataDay'));
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

        $player = Player::findOrFail($id);

        $lichSuThue = LichSuThuePlayer::where('player_id', $id)
            ->where('trang_thai_thue', 'thành công')
            ->get();

        $tongDoanhThu = $lichSuThue->sum(function ($thue) {
            return $thue->gia_player * $thue->gio_thue;
        });


        $soDonThue = $lichSuThue->count();

        $tongGioThue = $lichSuThue->sum('gio_thue');

        $soNguoiTheoDoi = TheoDoiPlayer::where('player_id', $id)
            ->distinct('tai_khoan_id')
            ->count('tai_khoan_id');


        $chartDataDay = collect(range(0, 23))->map(function ($hour) use ($id): array {
            $rentals = LichSuThuePlayer::with('taiKhoan')
                ->where('player_id', $id)
                ->where('trang_thai_thue', 'thành công')
                ->whereDate('created_at', Carbon::today())
                ->whereRaw('HOUR(created_at) = ?', [$hour])
                ->get();

            $totalHour = $rentals->sum('gio_thue');
            $renterNames = $rentals->map(function ($rental) {
                return $rental->taiKhoan->ten ?? 'Không có tên';
            })->unique()->values();



            return [
                'hour' => $hour,
                'total_hour' => $totalHour,
                'renter_names' => $renterNames
            ];
        });

        $chartData = LichSuThuePlayer::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(gio_thue) as total_hours')
        )
            ->where('player_id', $id)
            ->where('trang_thai_thue', 'thành công')
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
            ->where('player_id', $id)
            ->where('trang_thai_thue', 'thành công')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($data) {
                return [
                    'date' => $data->date,
                    'total_earnings' => $data->total_earnings
                ];
            });

        $query = $request->input('query');
        $danhGia = $request->input('danh_gia');

        // Lấy danh sách bình luận với phân trang
        $binhLuans = BinhLuan::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('player_id', 'like', '%' . $query . '%');
        })
            ->when($danhGia, function ($queryBuilder) use ($danhGia) {
                return $queryBuilder->where('danh_gia', $danhGia);
            })

            ->with('taikhoan')
            ->paginate(10); // Số bình luận trên mỗi trang

        // Nhóm bình luận theo player_id
        $groupedBinhLuans = $binhLuans->groupBy('player_id');





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



        return view('admin.players.show', compact('player', 'soDonThue', 'tongGioThue', 'soNguoiTheoDoi', 'tongDoanhThu', 'labels', 'data', 'labelsTongTien', 'dataTongTien', 'chartDataDay', 'groupedBinhLuans', 'binhLuans'));
    }


    public function showlichsu($id)
    {
        // Eager load taiKhoan để lấy thông tin khách hàng
        $lichSuThue = LichSuThuePlayer::with('taiKhoan')
            ->where('player_id', $id)
            ->get();


        return view('admin.players.showlichsu', compact('lichSuThue'));
    }

    public function yeuCau()
    {
        $acceptPlayers = Player::whereIn('tinh_trang', ['Chờ xử lý', 'Từ chối'])
                            ->get();

        return view('admin.players.yeucauduyet', compact('acceptPlayers'));
    }

    public function chapNhan(Request $request, $id)
    {
        $request->validate([
            'tinh_trang' => 'required|in:Chờ xử lý,Duyệt,Từ chối',
        ]);

        $player = Player::findOrFail($id);

        $player->tinh_trang = $request->input('tinh_trang');
        $player->save();

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }
}
