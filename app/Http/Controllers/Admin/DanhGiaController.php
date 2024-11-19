<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    public function index()
    {
        $danhGias = DanhGia::all();
        return view('admin.danh-gia.index', compact('danhGias'));
    }
}
