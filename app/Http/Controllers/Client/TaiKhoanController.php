<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index(){
        return view("client.tai-khoans.thong-tin-ca-nhan");
    }

    public function thongKe(){
        return view("client.tai-khoans.thong-ke");
    }

    public function email(){
        return view("client.tai-khoans.cai-dats.email");
    }

    public function taiKhoanVaMatKhau(){
        return view("client.tai-khoans.cai-dats.tai-khoan-va-mat-khau");
    }
}
