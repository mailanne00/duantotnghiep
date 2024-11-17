<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class DanhmucController extends Controller
{
    public function index()
    {
        return view('client.danh-muc.index');
    }
}
