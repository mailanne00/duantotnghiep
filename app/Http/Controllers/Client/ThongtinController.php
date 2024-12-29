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

        $danhmuctaikhoans = explode(',', $user->danh_muc_tai_khoans); // Nếu trong DB bạn lưu các ID danh mục dưới dạng chuỗi phân cách bởi dấu phẩy


        $selected = $user->danh_muc_tai_khoans
            ? explode(',', $user->danh_muc_tai_khoans)
            : [];

        return view('client.thong-tin-ca-nhan.index', compact('user', 'categories', 'selected', 'danhmuctaikhoans'));
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
        $user->gia_tien = $request->input('gia_tien');
        $user->anh_dai_dien = $dai_dien;
        $user->biet_danh = $request->input('biet_danh');
        $user->selected_categories = $request->input('selected_categories');


        // Nếu người dùng nhập mật khẩu mới, hãy hash và cập nhật
        if ($request->has('password') && !empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
        if ($request->hasFile('cccd')) {
            // Xóa ảnh CCCD cũ nếu có
            if ($user->cccd) {
                Storage::disk('public')->delete($user->cccd);
            }
        
            // Upload ảnh CCCD mới
            $data['cccd'] = Storage::put(self::PATH_UPLOAD, $request->file('cccd'));
            $user->cccd= $data['cccd'];
        }
        
        if ($request->hasFile('personal_video')) {
            // Xóa video cũ nếu có
            if ($user->personal_video) {
                Storage::disk('public')->delete($user->personal_video);
            }
        
            // Upload video mới
            $data['personal_video'] = Storage::put(self::PATH_UPLOAD, $request->file('personal_video'));
            $user->personal_video = $data['personal_video'];
        }
        
        // Kiểm tra nếu cả ảnh CCCD và video được tải lên -> xác thực
        if ($user->cccd && $user->personal_video) {
            $user->trang_thai_xac_thuc = true;
        } else {
            $user->trang_thai_xac_thuc = false;
        }
        
        $user->save();
        
        

        return redirect()->route('client.thongtincanhan')->with('success', 'Cập nhật thông tin thành công!');
    }
}
