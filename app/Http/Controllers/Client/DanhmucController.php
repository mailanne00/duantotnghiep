<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;

class DanhmucController extends Controller
{
    public function index()
    {
        $danhMucs = Danhmuc::all();
        return view('client.danh-muc.index', compact('danhMucs'));
    }
}
