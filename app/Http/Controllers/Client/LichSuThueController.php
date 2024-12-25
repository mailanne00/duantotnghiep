<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LichSuThueRequest;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class LichSuThueController extends Controller
{
    public function index()
    {
        $users = LichSuThue::where("nguoi_thue", auth()->user()->id)
            ->orderByDesc("created_at")
            ->get();

        return view('client.lich-su-thue.index', compact('users'));
    }

    public function themDonThue(LichSuThueRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('client.login');
        }

        // $validateData = $request->validated();

        $users = LichSuThue::create([
            'nguoi_thue' => auth()->user()->id,
            'nguoi_duoc_thue' => $request->user_id,
            'gia_thue' => $request->gia_thue,
            'gio_thue' => $request->gio_thue,
        ]);
        // $users = LichSuThue::create([
        //     'nguoi_thue' => auth()->user()->id,
        //     'nguoi_duoc_thue' => $validateData["user_id"],
        //     'gia_thue' => $validateData["gia_thue"],
        //     'gio_thue' => $validateData["gio_thue"],
        // ]);

        // $khach = TaiKhoan::where('id', '=', auth()->user()->id);

        return redirect()->route('client.lichSuThue');
    }

    public function lichSuDuocThue()
    {
        $users = LichSuThue::where("nguoi_duoc_thue", auth()->user()->id)
            ->orderByDesc("id")
            ->get();

        return view('client.lich-su-thue.lich-su-duoc-thue', compact('users'));
    }

    public function suaTrangThaiDonThue($id)
    {
        $trangThais = LichSuThue::where("nguoi_duoc_thue", auth()->user()->id)
            ->get();

        return view('client.lich-su-thue.lich-su-duoc-thue', compact('users'));
    }

    public function huyDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id); 
        $user->markAsCancelled();

        return redirect()->back()->with('success', 'Huỷ đơn thuê thành công.');
    }

    public function nhanDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id); 
        $user->markAsProcessing();

        return redirect()->back()->with('success', 'Nhận đơn thuê thành công.');
    }

    public function ketThucDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id); 
        $user->markAsEnd();

        return redirect()->back()->with('success', 'Kết thúc đơn thuê thành công.');
    }

    public function xoaDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id); 
        $user->delete();

        return redirect()->back()->with('success', 'Xoá đơn thuê thành công.');
    }
}
