<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        ]);

        TaiKhoan::create([
            'ten' => $request->ten,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Sử dụng trường "password" thay vì "pass"
        ]);

        return redirect()->route('client.login')->with('success', 'User created successfully!');
    }
}
