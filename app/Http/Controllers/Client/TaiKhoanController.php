<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index()
    {
        return view("client.index");
    }

    public function thongTinCaNhan()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.thong-tin-ca-nhan");
    }

    public function thongKe()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.thong-ke");
    }

    public function email()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.cai-dats.email");
    }

    public function taiKhoanVaMatKhau()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.cai-dats.tai-khoan-va-mat-khau");
    }

    public function khoaBaoVe()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.cai-dats.khoa-bao-ve");
    }

    public function vip()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.cai-dats.vip");
    }

    public function hienThi()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.cai-dats.hien-thi");
    }

    public function lichSuDonate()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.lich-su-giao-dichs.lich-su-donate");
    }

    public function lichSuDuo()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.lich-su-giao-dichs.lich-su-duo");
    }
    
    public function lichSuTaoCode()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.lich-su-giao-dichs.lich-su-tao-code");
    }

    public function bienDongSoDu()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.lich-su-giao-dichs.bien-dong-so-du");
    }

    public function lichSuMuaThe()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.lich-su-giao-dichs.lich-su-mua-the");
    }

    public function daiLyCard()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.dai-ly-card");
    }

    public function thanhToan()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.thanh-toan");
    }

    public function vi()
    {
        return view("client.cai-dat-tai-khoans.tai-khoans.vi");
    }

    public function hashtags()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.hashtags");
    }

    public function url()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.cai-dats.url");
    }

    public function mangXaHoi()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.cai-dats.mang-xa-hoi");
    }

    public function caiDatHienThi()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.cai-dats.hien-thi");
    }

    public function bac()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.thanh-viens.bac");
    }

    public function danhSachThanhVien()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.thanh-viens.danh-sach-thanh-vien");
    }

    public function lichSuDangKyThanhVien()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.thanh-viens.lich-su-da-dang-ky");
    }

    public function caiDatMucTieu()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.muc-tieus.cai-dat");
    }

    public function lichSuMucTieu()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.muc-tieus.lich-su-muc-tieu");
    }

    
    public function danhSachChanComment()
    {
        return view("client.cai-dat-tai-khoans.trang-ca-nhans.danh-sach-chan-comment");
    }

    public function thongTinVi()
    {
        return view("client.cai-dat-tai-khoans.vi-dien-tus.cai-dats.thong-tin");
    }

    public function lichSuGiaoDich()
    {
        return view("client.cai-dat-tai-khoans.vi-dien-tus.cai-dats.lich-su-giao-dich");
    }

    public function linkPay()
    {
        return view("client.cai-dat-tai-khoans.vi-dien-tus.link-pay");
    }

    public function trangChuPlayer()
    {
        return view("client.cai-dat-tai-khoans.players.trang-chu-player");
    }

    public function khachHangThanThiet()
    {
        return view("client.cai-dat-tai-khoans.players.khach-hang-than-thiet");
    }

    public function caiDatPlayerUrl()
    {
        return view("client.cai-dat-tai-khoans.players.cai-dats.url");
    }

    public function thongTinPlayer()
    {
        return view("client.cai-dat-tai-khoans.players.cai-dats.thong-tin-player");
    }

    public function albumPlayer()
    {
        return view("client.cai-dat-tai-khoans.players.cai-dats.album-player");
    }

    public function caiDatDuo()
    {
        return view("client.cai-dat-tai-khoans.players.cai-dats.cai-dat-duo");
    }

    public function caiDatKhac()
    {
        return view("client.cai-dat-tai-khoans.players.cai-dats.khac");
    }

    public function lichSuDuoPlayer()
    {
        return view("client.cai-dat-tai-khoans.players.lich-su-nhan-duo-donates.lich-su-duo");
    }

    public function lichSuDonatePlayer()
    {
        return view("client.cai-dat-tai-khoans.players.lich-su-nhan-duo-donates.lich-su-donate");
    }

    public function danhSachChanUser()
    {
        return view("client.cai-dat-tai-khoans.players.danh-sach-chan-user");
    }

    public function huongDanPlayer()
    {
        return view("client.cai-dat-tai-khoans.players.huong-dan-player");
    }

    public function donateCaiDat()
    {
        return view("client.cai-dat-tai-khoans.donates.cai-dat");
    }
}
