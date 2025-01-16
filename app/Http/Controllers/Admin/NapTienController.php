<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuNap;
use Illuminate\Http\Request;

class NapTienController extends Controller
{
    public function index()
    {
        $lichSuNaps = LichSuNap::with('nguoiNap')->get();
        return view('admin.nap-tien.index', compact('lichSuNaps'));
    }
}
