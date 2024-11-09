<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index()
    {
        return view("client.tai-khoans.thong-tin-ca-nhan");
    }

    public function thongKe()
    {
        return view("client.tai-khoans.thong-ke");
    }

    public function email()
    {
        return view("client.tai-khoans.cai-dats.email");
    }

    public function taiKhoanVaMatKhau()
    {
        return view("client.tai-khoans.cai-dats.tai-khoan-va-mat-khau");
    }

    public function khoaBaoVe()
    {
        return view("client.tai-khoans.cai-dats.khoa-bao-ve");
    }

    public function vip()
    {
        return view("client.tai-khoans.cai-dats.vip");
    }

    public function hienThi()
    {
        return view("client.tai-khoans.cai-dats.hien-thi");
    }

    public function lichSuDonate()
    {
        return view("client.tai-khoans.lich-su-giao-dichs.lich-su-donate");
    }

    public function lichSuDuo()
    {
        return view("client.tai-khoans.lich-su-giao-dichs.lich-su-duo");
    }
    
    public function lichSuTaoCode()
    {
        return view("client.tai-khoans.lich-su-giao-dichs.lich-su-tao-code");
    }

    public function bienDongSoDu()
    {
        return view("client.tai-khoans.lich-su-giao-dichs.bien-dong-so-du");
    }

    public function lichSuMuaThe()
    {
        return view("client.tai-khoans.lich-su-giao-dichs.lich-su-mua-the");
    }
}
