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

    public function show(int $id) {
        $toCao = ToCao::query()->findOrFail($id);

        $toCao->donThue->thoi_gian_ket_thuc = Carbon::parse($toCao->created_at)->addHours($toCao->gio_thue);
        
        $tinNhans = TinNhan::query()->where('');
        return view('admin.to-cao.show', compact('toCao'));
    }
}
