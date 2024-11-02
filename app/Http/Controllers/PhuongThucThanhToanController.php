<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhuongThucThanhToanStoreRequest;
use App\Models\PhuongThucThanhToan;
use Illuminate\Http\Request;

class PhuongThucThanhToanController extends Controller
{
    const PATH_UPLOAD = "public/logo";
    public function index()
    {
        $phuongthucthanhtoans = PhuongThucThanhToan::all();
        return view("admin.phuong-thuc-thanh-toans.index", compact('phuongthucthanhtoans'));
    }

    public function create()
    {
        return view('admin.phuong-thuc-thanh-toans.create');
    }

    public function store(PhuongThucThanhToanStoreRequest $request)
    {
        $validate = $request->validated();
        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::put(self::PATH_UPLOAD, $request->file('logo'));
        }
        PhuongThucThanhToan::create($data);

        return redirect()->route('admin.phuongthucthanhtoans.index');
    }

    public function edit(int $id)
    {
        $phuongthucthanhtoan = PhuongThucThanhToan::findOrFail($id);
        return view('admin.phuong-thuc-thanh-toans.edit', compact('phuongthucthanhtoan'));
    }

    public function update(Request $request, int $id)
    {
        $phuongthucthanhtoan = PhuongThucThanhToan::findOrFail($id);
        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($request->logo);
            $data['logo'] = Storage::put(self::PATH_UPLOAD, $request->file('logo'));
        }
        $phuongthucthanhtoan->update($data);

        return redirect()->route('admin.phuongthucthanhtoans.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $phuongthucthanhtoan = PhuongThucThanhToan::findOrFail($id);
        $trang_thai = $request->input('trang_thai') ? 1 : 0;
        $phuongthucthanhtoan->trang_thai = $trang_thai;
        $phuongthucthanhtoan->save();

        return redirect()->route('admin.phuongthucthanhtoans.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy(PhuongThucThanhToan $id)
    {
        $phuongthucthanhtoan = PhuongThucThanhToan::findOrFail($id);
        $phuongthucthanhtoan->delete();
        return redirect()->route('admin.phuongthucthanhtoans.index');
    }
}
