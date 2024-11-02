<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index(Request $request)
    {
        $taikhoans = TaiKhoan::all();

        return view('admin.taikhoans.index', compact('taikhoans'));
    }
    public function create()
    {

        return view("admin.taikhoans.create");
    }
    public function store(Request $request)
    {
        // Thêm validation
        $request->validate([
            'ten' => 'required|string|max:255',
            'ngay_sinh' => 'required|date',
            'biet_danh' => 'required|string|max:255',
            'gioi_tinh' => 'required|in:Nam,Nữ',
            'email' => 'required|email|unique:tai_khoans,email',
            'sdt' => 'required|numeric|digits_between:10,15',
            'mat_khau' => 'required|string|min:8',
            
            'bi_cam' => 'boolean',


        ], [
            'ten.required' => 'Tên không được để trống.',
            'ten.string' => 'Tên phải là chuỗi ký tự.',
            'ten.max' => 'Tên không được vượt quá 255 ký tự.',
            'ngay_sinh.required' => 'Ngày sinh không được để trống.',
            'ngay_sinh.date' => 'Ngày sinh không hợp lệ.',
            'biet_danh.required' => 'Biệt danh không được để trống.',

            'gioi_tinh.required' => 'Giới tính không được để trống.',

            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',
            'sdt.required' => 'Số điện thoại không được để trống.',
            'sdt.numeric' => 'Số điện thoại phải là số.',
            'sdt.digits_between' => 'Số điện thoại phải từ 10 đến 15 chữ số.',
            'cccd.required' => 'CCCD không được để trống.',
            'cccd.unique' => 'CCCD này đã được sử dụng.',
            'mat_khau.required' => 'Mật khẩu không được để trống.',
            'mat_khau.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
           
            'anh_dai_dien.required' => 'Ảnh đại diện không được để trống.',
            'anh_dai_dien.image' => 'Ảnh đại diện phải là định dạng ảnh.',

            
        ]);
        //Xử lí ảnh cccd
        $cccdPath = $request->file('cccd')->store('cccds', 'public');
        // Xử lý file ảnh đại diện
        $avatarPath = $request->file('anh_dai_dien')->store('avatars', 'public');

        // Tạo tài khoản mới
        $taikhoans = new TaiKhoan();
        $taikhoans->ten = $request->ten;
        $taikhoans->ngay_sinh = $request->ngay_sinh;
        $taikhoans->biet_danh = $request->biet_danh;
        $taikhoans->gioi_tinh = $request->gioi_tinh;
        $taikhoans->email = $request->email;
        $taikhoans->sdt = $request->sdt;
        $taikhoans->cccd = $request->cccd;
        $taikhoans->mat_khau = $request->mat_khau;
        
        $taikhoans->anh_dai_dien = $avatarPath;
        $taikhoans->cccd = $cccdPath;
        $taikhoans->banned_at = $request->has('bi_cam') ? now() : null; // Trạng thái cấm tài khoản
        $taikhoans->id_dinh_danh = $taikhoans->generateAccountId();
        


        $taikhoans->save();

        return redirect()->route('admin.taikhoans.index')->with('success', 'Thêm tài khoản thành công!');
    }

}
