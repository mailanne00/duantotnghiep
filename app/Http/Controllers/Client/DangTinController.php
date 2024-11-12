<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DangTin;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class DangTinController extends Controller
{
    public function index()
    {
        $dangtins = DangTin::withCount('luotThichs')->get();
        $taikhoans = TaiKhoan::all();
        return view('client.dang-tins.index', compact('dangtins', 'taikhoans'));
    }
}
