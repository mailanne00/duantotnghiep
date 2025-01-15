<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
use App\Models\DanhMuc;
use App\Models\DanhMucTaiKhoan;
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

        $selectedCategories = DanhMucTaiKhoan::where('tai_khoan_id', $user->id)
            ->pluck('danh_muc_id')
            ->toArray();

        return view('client.thong-tin-ca-nhan.index', compact('user', 'categories', 'selectedCategories'));
    }



    public function update(Request $request)
{
    $user = TaiKhoan::query()->findOrFail(Auth::id());
    $data = $request->except('anh_dai_dien', 'danh_muc', 'cccd', 'personal_video');

    if ($user->trang_thai_xac_thuc == 1) {
        $request->validate([
            'gia_tien' => 'required|numeric|min:0',
            'mo_ta' => 'nullable|string|max:255',
        ]);

        // Cập nhật thông tin
        $user->gia_tien = $request->input('gia_tien');
        $user->mo_ta = $request->input('mo_ta');
        $user->save();


    if ($request->hasFile('anh_dai_dien')) {
        if ($user->anh_dai_dien) {
            Storage::disk('public')->delete($user->anh_dai_dien);
        }
        $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD, $request->file('anh_dai_dien'));
        $user->anh_dai_dien = $data['anh_dai_dien'];
    }

    // Xử lý CCCD
    if ($request->hasFile('cccd')) {
        if ($user->cccd) {
            Storage::disk('public')->delete($user->cccd);
        }
        $data['cccd'] = Storage::put(self::PATH_UPLOAD, $request->file('cccd'));
        $user->cccd = $data['cccd'];

        
    }

    // Xử lý video cá nhân
    if ($request->hasFile('personal_video')) {
        if ($user->personal_video) {
            Storage::disk('public')->delete($user->personal_video);
        }
        $data['personal_video'] = Storage::put(self::PATH_UPLOAD, $request->file('personal_video'));
        $user->personal_video = $data['personal_video'];

    
    }

    $user->update($data);

    return redirect()->route('client.thongtincanhan')->with('success', 'Cập nhật thông tin thành công!');
}

}
}
