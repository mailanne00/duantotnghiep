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

      
        $user = TaiKhoan::findOrFail(Auth::id());
        $data = $request->except('anh_dai_dien', 'danh_muc', 'cccd_so', 'cccd', 'personal_video');
        
        // Xử lý ảnh đại diện
        if ($request->hasFile('anh_dai_dien')) {
            // Xóa ảnh đại diện cũ nếu tồn tại
            if ($user->anh_dai_dien) {
                Storage::disk('public')->delete($user->anh_dai_dien);
            }
            // Lưu ảnh đại diện mới
            $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD, $request->file('anh_dai_dien'));
        }

        // Xử lý danh mục
        DanhMucTaiKhoan::where('tai_khoan_id', $user->id)->delete();
        if ($request->has('danh_muc')) {
            $danhMucs = explode(',', $request->danh_muc); // Chuyển chuỗi danh mục thành mảng
            foreach ($danhMucs as $danhMuc) {
                DanhMucTaiKhoan::create([
                    'tai_khoan_id' => $user->id,
                    'danh_muc_id' => $danhMuc
                ]);
            }
        }

        // Kiểm tra số CCCD
        if ($request->cccd_so) {
            $validatedData = $request->validate([
                'cccd_so' => 'numeric|digits:12',
            ], [
                'cccd_so.numeric' => 'Số CCCD chỉ được chứa các chữ số.',
                'cccd_so.digits' => 'Số CCCD phải có đúng 12 chữ số.',
            ]);
        }

        // Xử lý ảnh CCCD
        if ($request->hasFile('cccd')) {
            // Xóa ảnh CCCD cũ nếu có
            if ($user->cccd) {
                Storage::disk('public')->delete($user->cccd);
            }

            // Upload ảnh CCCD mới
            $data['cccd'] = Storage::put(self::PATH_UPLOAD, $request->file('cccd'));
            $user->cccd = $data['cccd'];
        }

        // Xử lý video cá nhân
        if ($request->hasFile('personal_video')) {
            // Xóa video cũ nếu có
            if ($user->personal_video) {
                Storage::disk('public')->delete($user->personal_video);
            }

            // Upload video mới
            $data['personal_video'] = Storage::put(self::PATH_UPLOAD, $request->file('personal_video'));
            $user->personal_video = $data['personal_video'];
        }

        // Cập nhật trạng thái xác thực nếu có CCCD hoặc video được tải lên
        if ($request->hasFile('cccd') || $request->hasFile('personal_video')) {
            $user->trang_thai_xac_thuc = 0; // Cập nhật trạng thái xác thực là chưa xác thực
        }
        $user->trang_thai = $request->has('trang_thai') ? 1 : 2;
        // Lưu lại tất cả thay đổi
        $user->update($data);

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }
}
