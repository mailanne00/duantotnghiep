<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dang-nhaps.index');
    }

    public function dangNhap(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Kiểm tra xem thông tin đăng nhập có được cung cấp không
        if (empty($credentials['email']) || empty($credentials['password'])) {

            return redirect()->route('admin.dangnhap.index')->with(['Bạn cần nhập email và mật khẩu.']);
        }
        // Xác thực tài khoản
        if (Auth::attempt($credentials)) {
            $taiKhoan = Auth::user();
            // Kiểm tra xem tài khoản có phải admin hay không
            if ($taiKhoan->isAdmin()) {
                return redirect()->route('admin.index');
            } else {
                Auth::logout();
                return redirect()->route('admin.dangnhap.index')->with(['Bạn không có quyền truy cập.']);
            }
        } else {
            return redirect()->route('admin.dangnhap.index')->with(['Thông tin đăng nhập không chính xác.']);
        }
    }

    public function trangChu()
    {
        return view('admin.index');
    }
}
