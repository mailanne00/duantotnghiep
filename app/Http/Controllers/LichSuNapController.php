<?php

namespace App\Http\Controllers;

use App\Models\LichSuNap;
use Illuminate\Http\Request;

class LichSuNapController extends Controller
{
    public function index()
    {
        $quanLiNapTiens = LichSuNap::all();

        return view('admin.quan-li-nap-tiens.index', compact('quanLiNapTiens'));
    }

    public function show($id)
    {
        $quanLiNapTien = LichSuNap::query()->findOrFail($id);

        return view('admin.quan-li-nap-tiens.show', compact('quanLiNapTien'));
    }

    public function update(Request $request, $id)
    {
        $quanliNap = LichSuNap::query()->findOrFail($id);
        if ($quanliNap->trang_thai_thanh_toan == 'Đang chờ xử lí') {
            if (isset($request->btnDuyet)) {
                $quanliNap->update([
                    'trang_thai_thanh_toan' => 'Thành công'
                ]);

                $quanliNap->account->update([
                    'so_du' => $quanliNap->account->so_du + $quanliNap->so_tien,
                ]);
            } else if (isset($request->btnHuy)) {
                $quanliNap->update([
                    'trang_thai_thanh_toan' => 'Đã bị huỷ'
                ]);
            }
        }
        return redirect()->route('admin.quan-li-nap-tiens.index')->with(['success'=> 'update thành công']);
    }
}
