<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucStoreRequest;
use App\Http\Requests\DanhMucUpdateRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DanhMucController extends Controller
{
    const PATH_UPLOAD = "public/image";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhmucs = DanhMuc::all();
        return view('admin.danh-mucs.index', compact('danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.danh-mucs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucStoreRequest $request)
    {
        $validate = $request->validated();

        $data = $request->except('anh_dai_dien');

        if ($request->hasFile('anh_dai_dien')) {
            $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD, $request->file('anh_dai_dien'));
        }

        // dd($request->all());
        DanhMuc::create($data);

        return redirect()->route('admin.danhmucs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DanhMuc $catalogue)
    {
        dd($catalogue);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $danhmuc = DanhMuc::findOrFail($id);

        return view('admin.danh-mucs.edit', compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DanhMucUpdateRequest $request, int $id)
    {
        $validate = $request->validated();
        $danhmuc = DanhMuc::findOrFail($id);
        $data = $request->except('anh_dai_dien');

        if ($request->hasFile('anh_dai_dien')) {
            Storage::disk('public')->delete($request->anh_dai_dien);
            $data['anh_dai_dien'] = Storage::put(self::PATH_UPLOAD, $request->file('anh_dai_dien'));
        }
        $danhmuc->update($data);
        return redirect()->route('admin.danhmucs.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        $trang_thai = $request->input('trang_thai') ? 1 : 0;
        $danhmuc->trang_thai = $trang_thai;
        $danhmuc->save();

        return redirect()->route('admin.danhmucs.index')->with('success', 'Cập nhật thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        $danhmuc->delete();
        return redirect()->route('admin.danhmucs.index');
    }
}
