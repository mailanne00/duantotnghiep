<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $toCao->donThue->thoi_gian_ket_thuc = Carbon::parse($toCao->created_at)->addHours($toCao->gio_thue);
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
        $toCao->trang_thai = '1';
        $toCao->save();

        return redirect()->route('admin.to-caos.index')->with('success', 'Đơn tố cáo đã được duyệt.');
    }

    public function reject($id)
    {
        $toCao = ToCao::findOrFail($id);
        $toCao->trang_thai = '2';
        $toCao->save();

        return redirect()->route('admin.to-caos.index')->with('error', 'Đơn tố cáo đã bị từ chối.');
    }
}
