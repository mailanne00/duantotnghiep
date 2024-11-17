<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ChinhsachController extends Controller
{
    public function index()
    {
        return view('client.chinh-sach.index');
    }
}
