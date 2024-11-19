<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class LichSuThueController extends Controller
{
    public function index()
    {
        $users = LichSuThue::where("nguoi_thue", auth()->user()->id)
            ->get();
        
        return view('client.lich-su-thue.index', compact('users'));
    }
}
