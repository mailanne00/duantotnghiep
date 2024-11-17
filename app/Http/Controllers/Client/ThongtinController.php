<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ThongtinController extends Controller
{
    public function index()
    {

        return view('client.thong-tin-ca-nhan.index');
    }
}
