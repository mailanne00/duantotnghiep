<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucStoreRequest;
use App\Http\Requests\DanhMucUpdateRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    const PATH_UPLOAD = 'public/images';
    public function index()
    {
        $danhMucs = DanhMuc::all();
        return view('admin.danh-muc.index', compact('danhMucs'));
    }

    public function create()
    {
        return view('admin.danh-muc.create');
    }

    public function store(DanhMucStoreRequest $request)
    {
        $validated = $request->validated();
        $data = $request->except('anh');

        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        }

        DanhMuc::create($data);

        return redirect()->route('admin.danh-mucs.index')->with(['success' => 1]);
    }

    public function show(DanhMuc $id) {}

    public function edit($id)
    {
        $danhMuc = DanhMuc::query()->findOrFail($id);
        return view('admin.danh-muc.edit', compact('danhMuc'));
    }

    public function update(DanhMucUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $danhMuc = DanhMuc::query()->findOrFail($id);
        $data = $request->except('anh');

        if ($request->hasFile('anh')) {
            Storage::disk('public')->delete($request->anh);
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        }
        $danhMuc->update($data);
        return redirect()->route('admin.danh-mucs.index')->with(['success' => 1]);
    }
    public function destroy($id)
    {
        $danhMuc = DanhMuc::query()->findOrFail($id);
        $danhMuc->delete();
        return redirect()->route('admin.danh-mucs.index')->with(['success' => 1]);
    }
}
