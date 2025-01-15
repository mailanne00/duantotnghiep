<?php

namespace App\Http\Controllers\Client;

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


    public function store(Request $request)
    {
        // Kiểm tra nếu đã có tố cáo với lich_su_thue_id này
        $existingToCao = ToCao::where('lich_su_thue_id', $request->input('lich_su_thue_id'))->first();

        if ($existingToCao) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có tố cáo cho đơn thuê này.',
            ], 400);
        }

        // Nếu chưa có tố cáo, tạo mới
        $toCao = ToCao::create([
            'nguoi_to_cao' => $request->input('nguoi_to_cao'),
            'nguoi_bi_to_cao' => $request->input('nguoi_bi_to_cao'),
            'lich_su_thue_id' => $request->input('lich_su_thue_id'),
            'anh_bang_chung' => $request->input('anh_bang_chung'),
            'ly_do' => $request->input('ly_do'),
            'trang_thai' => $request->input('trang_thai'),
            'phong_chat_id' => $request->input('phong_chat_id'),
        ]);

        // Trả về JSON response
        return response()->json([
            'success' => true,
            'message' => 'Tố cáo đã được tạo thành công.',
            'error' => 'Đã có tố cáo cho đơn thuê này.',
            'data' => $toCao,
        ], 201);
    }


    public function show(int $id)
    {
        $toCao = ToCao::query()->findOrFail($id);

        $toCao->donThue->thoi_gian_ket_thuc = Carbon::parse($toCao->created_at)->addHours($toCao->gio_thue);

        $tinNhans = TinNhan::query()->where('');
        return view('admin.to-cao.show', compact('toCao'));
    }
}
