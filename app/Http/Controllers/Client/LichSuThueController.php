<?php

namespace App\Http\Controllers\Client;

use App\Events\LichSuThueCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\LichSuThueRequest;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LichSuThueController extends Controller
{
    public function index()
    {
        $users = LichSuThue::where("nguoi_thue", auth()->user()->id)
            ->orderByDesc("created_at")
            ->get()
            ->map(function ($user) {
                // Tính toán thời gian kết thúc
                $user->thoi_gian_ket_thuc = Carbon::parse($user->created_at)->addHours($user->gio_thue);
                return $user;
            });

        $timeNow = Carbon::now();
        $checkExpired = LichSuThue::where('expired', '<', $timeNow)
            ->where('trang_thai', '=', '0')
            ->update(['trang_thai' => '2']);

        return view('client.lich-su-thue.index', compact('users'));
    }

    public function themDonThue(LichSuThueRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('client.login');
        }

        $validateData = $request->validated();
        $timeNow = Carbon::now();
        $timePlus5Minutes = $timeNow->addMinutes(5);

        $checkLichSuThue = LichSuThue::where('nguoi_thue', auth()->user()->id)
            ->where('nguoi_duoc_thue', $validateData['user_id'])
            ->where('trang_thai', '=', '0')
            ->where('expired', '<=', $timeNow)
            ->first();


        if ($checkLichSuThue) {
            // dd($checkLichSuThue);
            // Cập nhật bản ghi hiện có
            $checkLichSuThue->gio_thue += $validateData['gio_thue'];
            // $checkLichSuThue->gia_thue += $validateData['gia_thue'];
            $checkLichSuThue->expired = $timePlus5Minutes;
            $checkLichSuThue->save();

            $taiKhoan = TaiKhoan::where('id', auth()->user()->id)->first();
            $tongGia = $taiKhoan->so_du - $request['tong_gia'];
            $taiKhoan->update(['so_du' => $tongGia]);

            return redirect()->back()->with('success', 'Thuê thành công.');
        } else {

            $lichSuThue = LichSuThue::create([
                'nguoi_thue' => auth()->user()->id,
                'nguoi_duoc_thue' => $validateData['user_id'],
                'gia_thue' => $validateData['gia_thue'],
                'gio_thue' => $validateData['gio_thue'],
                'expired' => $timePlus5Minutes
            ]);

            $taiKhoan = TaiKhoan::where('id', auth()->user()->id)->first();
            $tongGia = $taiKhoan->so_du - $request['tong_gia'];
            $taiKhoan->update(['so_du' => $tongGia]);
        }

        return redirect()->back()->with('success', 'Thuê thành công.');
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

        $taiKhoan = auth()->user();

        $taiKhoan->so_du += $user->gio_thue * $user->gia_thue;
        $taiKhoan->save();

        return redirect()->back()->with('success', 'Huỷ đơn thuê thành công.');
    }

    public function tuChoiDonThue(Request $request, $id)
    {
        $lichSuThue = LichSuThue::find($id);
        $lichSuThue->markAsCancelled();

        $taiKhoan = TaiKhoan::where('id', $request->tai_khoan_id)->first();

        $taiKhoan->so_du += $lichSuThue->gio_thue * $lichSuThue->gia_thue;
        $taiKhoan->save();

        return redirect()->back()->with('success', 'Từ chối thuê thành công.');
    }

    public function nhanDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id);
        $user->markAsProcessing();

        return redirect()->back()->with('success', 'Nhận đơn thuê thành công.');
    }

    public function ketThucDonThue(Request $request, $id)
    {
        $lichSuThue = LichSuThue::find($id);
        $lichSuThue->markAsEnd();

        $user = TaiKhoan::where('id', $request->user_id)->first();


        $user->so_du += ($lichSuThue->gio_thue * $lichSuThue->gia_thue)*0.9;
        $user->save();

        return redirect()->back()->with('success', 'Kết thúc đơn thuê thành công.');
    }

    public function xoaDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Xoá đơn thuê thành công.');
    }
}
