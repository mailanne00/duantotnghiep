<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {

        return view('client.dang-nhap.index');
    }

    
}
