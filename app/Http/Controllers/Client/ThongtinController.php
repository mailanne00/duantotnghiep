<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Storage;

class ThongtinController extends Controller
{

    const PATH_UPLOAD = 'public/images';

    public function index()
    {
        $categories = DanhMuc::all();
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('client.login')->with('error', 'Vui lòng đăng nhập để tiếp tục');
        }

        $selectedCategories = explode(',', $user->selected_categories); // Nếu trong DB bạn lưu các ID danh mục dưới dạng chuỗi phân cách bởi dấu phẩy


        $selected = $user->selected_categories
            ? explode(',', $user->selected_categories)
            : [];

        return view('client.thong-tin-ca-nhan.index', compact('user', 'categories', 'selected', 'selectedCategories'));
    }



    public function update(Request $request)
    {

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('client.login')->with('error', 'Vui lòng đăng nhập để tiếp tục');
        }


        $user = TaiKhoan::find($user->id);

        if (!$user) {
            return redirect()->route('client.login')->with('error', 'Không tìm thấy người dùng!');
        }

        $data = $request->except('anh_dai_dien');

        if ($request->has('selected_categories')) {
            // Lưu danh mục đã chọn dưới dạng mảng
            $selectedCategories = explode(',', $request->input('selected_categories'));
            $user->selected_categories = $selectedCategories;
        }


        if ($request->hasFile('anh_dai_dien')) {
            Storage::disk('public')->delete($request->anh_dai_dien);
            $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD, $request->file('anh_dai_dien'));
            $dai_dien = $data['anh_dai_dien'];
        }
        $user->ten = $request->input('ten');
        $user->email = $request->input('email');
        $user->ngay_sinh = $request->input('ngay_sinh');
        $user->gioi_tinh = $request->input('gioi_tinh');
        $user->dia_chi = $request->input('dia_chi');
        $user->sdt = $request->input('sdt');
        $user->anh_dai_dien = $dai_dien;
        $user->biet_danh = $request->input('biet_danh');
        $user->selected_categories = $request->input('selected_categories');


        // Nếu người dùng nhập mật khẩu mới, hãy hash và cập nhật
        if ($request->has('password') && !empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('client.thongtincanhan')->with('success', 'Cập nhật thông tin thành công!');
    }
}
