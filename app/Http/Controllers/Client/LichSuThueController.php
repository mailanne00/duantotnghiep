<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LichSuThueRequest;
use App\Models\LichSuThue;
use Carbon\Carbon;

class LichSuThueController extends Controller
{
    public function index()
    {
        $users = LichSuThue::where("nguoi_thue", auth()->user()->id)
            ->orderByDesc("created_at")
            ->get();

        $timeNow = Carbon::now();
        $checkExpired = LichSuThue::where('expired', '>', $timeNow)
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
        // Cập nhật bản ghi hiện có
        $checkLichSuThue->gio_thue += $validateData['gio_thue'];
        // $checkLichSuThue->gia_thue += $validateData['gia_thue'];
        $checkLichSuThue->expired = $timePlus5Minutes;
        $checkLichSuThue->save();

        return redirect()->back();
    } else {
        $lichSuThue = LichSuThue::create([
            'nguoi_thue' => auth()->user()->id,
            'nguoi_duoc_thue' => $validateData['user_id'],
            'gia_thue' => $validateData['gia_thue'],
            'gio_thue' => $validateData['gio_thue'],
            'expired' => $timePlus5Minutes
        ]);
    }

        return redirect()->back();
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
}
