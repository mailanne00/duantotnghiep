<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;

class HomeController extends Controller
{
    public function index()
    {

        $danhMucs = DanhMuc::all();
        return view('client.index', compact('danhMucs'));
    }
}
