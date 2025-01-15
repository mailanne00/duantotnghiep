<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\sendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;

class DangKyController extends Controller
{
    public function index()
    {
        return view('client.dang-ky.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:tai_khoans,email', // Kiểm tra email duy nhất trong bảng tai_khoans
            'password' => 'required|min:6',
        ], [
            'ten.required' => 'Vui lòng nhập tên',
            'ten.max' => 'Tên tối đa 255 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự',
        ]);

        TaiKhoan::create([
            'ten' => $request->ten,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('client.login')->with('successSignUp', 'User created successfully!');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:tai_khoans,email', // Kiểm tra email duy nhất trong bảng tai_khoans
            'password' => 'required|min:6',
        ], [
            'ten.required' => 'Vui lòng nhập tên',
            'ten.max' => 'Tên tối đa 255 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự',
        ]);

        $html = '<h2> Xác nhận email </h2>
        <p> Click vào nút sau để xác nhận email: </p>
            <form action="" method="post">
                <input type="hidden" name="_token" value="' . csrf_token() . '">
                <input type="hidden" name="password" value="' . $request->password . '">
                <input type="hidden" name="ten" value="' . $request->ten . '">
                <input type="hidden" name="email" value="' . $request->email . '">
                <button type="submit"> Xác nhận </button>
            </form>';
        sendEmailJob::dispatch($request->email, ['token' => csrf_token(), 'password' => $request->password, 'ten' => $request->ten, 'email' => $request->email, 'html' => $html])->delay(now()->addSeconds(5));

        return back()->with('sendEmail', 'Email sent successfully!');
    }
}
