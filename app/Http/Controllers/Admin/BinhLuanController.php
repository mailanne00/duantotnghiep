<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index()
    {
        $binhLuans = BinhLuan::all();
        return view('admin.binh-luan.index', compact('binhLuans'));
    }
}
