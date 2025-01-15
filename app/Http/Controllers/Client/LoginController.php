<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function index()
    {
        return view('client.dang-nhap.index');
    }
    // Xử lý đăng nhập
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required|min:6',
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'pass.required' => 'Vui lòng nhập mật khẩu',
            'pass.min' => 'Mật khẩu phải có ít nhất :min ký tự',
        ]);

        // Kiểm tra thông tin đăng nhập
        $credentials = [
            'email' => $request->email,
            'password' => $request->pass,
        ];

        if (Auth::attempt($credentials, true)) {
            // Lưu thông tin người dùng vào session
            $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
            session()->put('user', $user);

            // Chuyển hướng đến trang chủ hoặc trang cá nhân
            return redirect()->route('client.index')->with('success', 'Đăng nhập thành công!');
        }

        // Nếu đăng nhập không thành công
        return back()->with('error', 'Thông tin đăng nhập không chính xác!');
    }

    public function loginWithFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginFacebookCallBack(Request $request)
    {
        $facebookUser = Socialite::driver('facebook')->stateless()->user();
        dd($facebookUser);
    }


    public function show()
    {
        // Lấy thông tin người dùng từ session
        $user = session('user');

        if (!$user) {
            return redirect()->route('client.login')->with('error', 'Vui lòng đăng nhập để tiếp tục');
        }

        return view('client.thong-tin-ca-nhan.index', compact('user')); // Truyền dữ liệu người dùng đến view
    }

    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        session()->forget('user'); // Xóa thông tin người dùng trong session
        return redirect()->route('client.login'); // Chuyển hướng đến trang đăng nhập
    }
}
