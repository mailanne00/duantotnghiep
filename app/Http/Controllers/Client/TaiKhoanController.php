<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index(){
        return view("client.cai-dat-tai-khoans.index");
    }
}
