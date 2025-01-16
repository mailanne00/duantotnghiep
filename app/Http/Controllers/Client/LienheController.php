<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LienHeStoreRequest;
use App\Models\LienHe;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LienheController extends Controller
{
    const PATH_UPLOAD = 'public/lienhe';
    public function index()
    {
        return view('client.lien-he.index');
    }

    public function create()
    {
        if (auth()->check()) {
            $taiKhoan = auth()->user();
        } else {
            $taiKhoan = null;
        }
        return view('client.lien-he.create', compact('taiKhoan'));
    }

    public function store(LienHeStoreRequest $request)
    {
        if (auth()->check()) {
            $taiKhoans = TaiKhoan::where('phan_quyen_id', 1)->get();

            $validated = $request->validated();
            $data = $request->except('anh');

            $data['tai_khoan_id'] = \auth()->id();
            $data['ten'] = $request->ten;
            $data['email'] = $request->email;

            if ($request->hasFile('anh')) {
                $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
            }

            LienHe::create($data);

            foreach ($taiKhoans as $taiKhoan) {
                ThongBao::create([
                    'nguoi_gui_id' => auth()->id(),
                    'tai_khoan_id' => $taiKhoan->id, // Tạo thông báo cho từng tài khoản
                    'noi_dung' => 'đã gửi một liên hệ cho bạn',
                ]);
            }
            return redirect()->route('client.lienhe.create')->with(['success' => 'Gửi liên hệ thành công']);
        } else {
            return redirect()->route('client.lienhe.create')->with(['error' => 'Không thể gửi liên hệ']);
        }
    }
}
