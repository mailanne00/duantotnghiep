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

        $danh_muc_tai_khoans = DanhMucTaiKhoan::where('tai_khoan_id', $user->id)
            ->pluck('danh_muc_id')
            ->toArray();

        return view('client.thong-tin-ca-nhan.index', compact('user', 'categories', 'danh_muc_tai_khoans'));
    }



    public function update(Request $request)
    {
        $user = TaiKhoan::query()->findOrFail(Auth::id());
        $data = $request->except('anh_dai_dien', 'danh_muc', 'cccd', 'personal_video');

        if ($request->hasFile('anh_dai_dien')) {
            // Xóa ảnh đại diện cũ nếu tồn tại
            if ($user->anh_dai_dien) {
                Storage::disk('public')->delete($user->anh_dai_dien);
            }
        
            // Lưu ảnh đại diện mới
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
        // if ($user->cccd && $user->personal_video) {
        //     $user->trang_thai_xac_thuc = true;
        // } else {
        //     $user->trang_thai_xac_thuc = false;
        // }

        if ($request->hasFile('cccd') || $request->hasFile('personal_video')) {
                $user->trang_thai_xac_thuc = 0;
        }
        
        $user->save();
        $user->update($data);

        return redirect()->route('client.thongtincanhan')->with('success', 'Cập nhật thông tin thành công!');
    }

    // Xử lý CCCD
   

}


