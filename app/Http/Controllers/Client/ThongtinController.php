<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMucTaiKhoan;
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
        $user = TaiKhoan::query()->findOrFail(Auth::id());
        $data = $request->except('anh_dai_dien', 'danh_muc');

        if ($request->hasFile('anh_dai_dien')) {
            Storage::disk('public')->delete($user->anh_dai_dien);
            $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD, $request->file('anh_dai_dien'));
        }

        if (isset($request->danh_muc)) {
            $danhMucs = explode(',', $request->danh_muc);
            DanhMucTaiKhoan::query()->where('tai_khoan_id', Auth::id())->delete();
            foreach ($danhMucs as $danhMuc) {
                if ($danhMuc != '') {
                    DanhMucTaiKhoan::query()->create([
                        'tai_khoan_id' => Auth::id(),
                        'danh_muc_id' => $danhMuc
                    ]);
                }
            }
        }
        $user->update($data);

        return redirect()->route('client.thongtincanhan')->with('success', 'Cập nhật thông tin thành công!');
    }
}
