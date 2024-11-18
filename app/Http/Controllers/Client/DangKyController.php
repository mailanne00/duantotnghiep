<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class DangKyController extends Controller
{
    public function index()
    {

        return view('client.dang-ky.index');
    }
}
