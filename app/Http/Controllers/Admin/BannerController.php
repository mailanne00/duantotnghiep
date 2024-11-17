<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    const PATH_UPLOAD = 'public/images';
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('anh');

        if($request->hasFile('anh')){
            $data['anh'] = Storage::put(self::PATH_UPLOAD,$request->file('anh'));
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with(['success' => 1]);
    }

    public function show(Banner $id){}

    public function edit($id){
        $banner = Banner::query()->findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id){
        $banner = Banner::query()->findOrFail($id);
        $data = $request->except('anh');

        if($request->hasFile('anh')){
            Storage::disk('public')->delete($request->anh);
            $data['anh'] = Storage::put(self::PATH_UPLOAD,$request->file('anh'));
        }
        $banner->update($data);
        return redirect()->route('admin.banners.index')->with(['success' => 1]);
    }
    public function destroy($id){
        $banner = Banner::query()->findOrFail($id);
        $banner->delete();
        return redirect()->route('admin.banners.index')->with(['success' => 1]);
    }
}
