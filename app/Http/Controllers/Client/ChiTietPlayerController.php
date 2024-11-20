<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use App\Models\DanhMuc;

class ChiTietPlayerController extends Controller
{
    public function index($id) // Tham số $id là ID của user
    {
        // Lấy thông tin user dựa trên ID
        $user = TaiKhoan::find($id);
        $users = TaiKhoan::where('bi_cam', 0)
            ->where('trang_thai', 1)
            ->whereNotNull('ten')
            ->whereNotNull('ngay_sinh')
            ->whereNotNull('gioi_tinh')
            ->whereNotNull('dia_chi')
            ->whereNotNull('email')
            ->whereNotNull('sdt')
            ->whereNotNull('selected_categories')
            ->whereNotNull('anh_dai_dien')
            ->whereNotNull('biet_danh')
            ->get();
        // Kiểm tra nếu không tìm thấy user
        if (!$user) {
            abort(404, 'Người dùng không tồn tại');
        }

        $selectedCategories = DanhMuc::whereIn('id', explode(',', $user->selected_categories))->get();


        // Truyền dữ liệu người dùng vào view
        return view('client.chi-tiet-player.index', compact('user', 'users', 'selectedCategories'));
    }
}
