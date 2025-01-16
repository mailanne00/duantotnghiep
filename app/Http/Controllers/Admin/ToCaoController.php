<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use App\Models\TinNhan;
use App\Models\ToCao;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ToCaoController extends Controller
{
    public function index()
    {
        $toCaos = ToCao::all();

        return view('admin.to-cao.index', compact('toCaos'));
    }

    public function show(int $id)
    {
        // Tìm đơn tố cáo dựa trên ID
        $toCao = ToCao::findOrFail($id);
        
        $toCao->donThue->thoi_gian_ket_thuc = Carbon::parse($toCao->donThue->created_at)->addHours($toCao->donThue->gio_thue);
        // Lấy thông tin đơn thuê từ đơn tố cáo
        $donThue = $toCao->donThue;

        // Xác định khoảng thời gian lọc
        $startTime = Carbon::parse($donThue->created_at)->toDateTimeString();
        $endTime = Carbon::parse($startTime)->addHours($donThue->gio_thue)->toDateTimeString();

        // Lọc tin nhắn thuộc phòng chat của đơn thuê và trong khoảng thời gian
        $tinNhans = TinNhan::with(['nguoiGui', 'nguoiNhan'])
            ->where('phong_chat_id', $toCao->phong_chat_id)
            ->whereBetween('created_at', [$startTime, $endTime])
            ->orderBy('created_at', 'asc') // Sắp xếp theo thời gian tăng dần
            ->get();

        // Kiểm tra kết quả và trả về view
        return view('admin.to-cao.show', compact('toCao', 'tinNhans'));
    }

    public function choxuli($id)
    {
        $toCao = ToCao::findOrFail($id);
        $toCao->trang_thai = '0';
        $toCao->save();

        return redirect()->route('admin.to-caos.index')->with('success', 'Đơn tố cáo cần thêm thông tin xử lí.');
    }


    public function approve($id)
    {
        $toCao = ToCao::findOrFail($id);
        $nguoiToCao = TaiKhoan::where('id', $toCao->nguoi_to_cao)->first();

        $lichSuThue = LichSuThue::where('id', $toCao->lich_su_thue_id)
        ->with('danhGia')
        ->first();
            // Tính toán thời gian kết thúc
        $lichSuThue->thoi_gian_ket_thuc = Carbon::parse($lichSuThue->created_at)->addHours($lichSuThue->gio_thue);
        $lichSuThue->tien_user_nhan = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (100 - (int)$lichSuThue->loi_nhuan) / 100;
        $lichSuThue->loi_nhuan_don = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (int)$lichSuThue->loi_nhuan / 100;
        
        if($toCao->trang_thai == 0){
            $toCao->trang_thai = '1';

            $nguoiToCao->so_du += ($lichSuThue->gio_thue * $lichSuThue->gia_thue);


            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã duyệt đơn tố cáo của bạn',
                'tai_khoan_id' => $toCao->nguoi_to_cao
            ]);

            $nguoiToCao->save();
            $toCao->save();
            return redirect()->route('admin.to-caos.index')->with('success', 'Đơn tố cáo đã được duyệt.');
        }

        return redirect()->route('admin.to-caos.index')->with('error', 'Đã xảy ra lỗi khi xử lý.');
    }

    public function reject($id)
    {
        $toCao = ToCao::findOrFail($id);

        $nguoiBiToCao = TaiKhoan::where('id', $toCao->nguoi_bi_to_cao)->first();
        $nguoiToCao = TaiKhoan::where('id', $toCao->nguoi_to_cao)->first();

        $lichSuThue = LichSuThue::where('id', $toCao->lich_su_thue_id)
        ->with('danhGia')
        ->first();
            // Tính toán thời gian kết thúc
        $lichSuThue->thoi_gian_ket_thuc = Carbon::parse($lichSuThue->created_at)->addHours($lichSuThue->gio_thue);
        $lichSuThue->tien_player_nhan = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (100 - (int)$lichSuThue->loi_nhuan) / 100;
        $lichSuThue->loi_nhuan_don = ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (int)$lichSuThue->loi_nhuan / 100;
        

        if($toCao->trang_thai == 0){
            $toCao->trang_thai = '2';

            $nguoiBiToCao->so_du += ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (100 - (int)$lichSuThue->loi_nhuan) / 100;

            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã từ chối đơn tố cáo của bạn',
                'tai_khoan_id' => $toCao->nguoi_to_cao
            ]);
            $nguoiBiToCao->save();
            $toCao->save();
            return redirect()->route('admin.to-caos.index')->with('success', 'Đơn tố cáo đã bị từ chối.');
        }

        return redirect()->route('admin.to-caos.index')->with('error', 'Đã xảy ra lỗi khi xử lý.');
    }
}
