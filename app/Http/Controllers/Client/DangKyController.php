<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DangKyController extends Controller
{
    const PATH_UPLOAD = 'public/images/';
    public function index()
    {
        return view('client.dang-ky.index');
    }

    public function store(Request $request)
    {
        $data = $request->except('anh_dai_dien');

        if($request->hasFile('anh_dai_dien')){
            $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD,$request->file('anh_dai_dien'));
        }

        TaiKhoan::create($data);

        return redirect()->route('admin.tai_khoans.index')->with(['success' => 1]);
    }

    public function update(Request $request, int $id)
    {
        $taiKhoan = TaiKhoan::query()->findOrFail($id);
        $data = $request->except('anh_dai_dien');

        if($request->hasFile('anh_dai_dien')){
            Storage::disk('public')->delete($request->anh_dai_dien);
            $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD,$request->file('anh_dai_dien'));
        }
        $taiKhoan->update($data);
        return redirect()->route('admin.tai_khoans.index')->with(['success' => 1]);
    }
}
