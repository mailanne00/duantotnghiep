<?php

namespace App\Http\Controllers;

use App\Models\PhanQuyen;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    const path_upload = "public/uploads/phan_quyens";

    public function index(Request $request)
    {
        $phanquyens = PhanQuyen::all();
        return view('admin.phan-quyens.index', compact('phanquyens'));
    }

    function create(){
        return view("admin.phan-quyens.create");
}
function store(Request $request){
    $phanquyens = PhanQuyen::create($request->all());
    return redirect()->route('admin.phanquyen.index')->with('success', 'Thêm thành công!');
}
public function edit(Request $request, $id)
    {
        $phanquyens = PhanQuyen::find($id);
        return view('admin.phan-quyens.edit', compact('phanquyens'));
    }
function update(Request $request, $id){
    $data = PhanQuyen::findOrFail($id);
   $data->update($request->all());
   return redirect()->route('admin.phanquyen.index')->with('success', 'Sửa thành công!');
}
function destroy( $id){
    $data = PhanQuyen::findOrFail($id);
   $data->delete();
   return redirect()->route("admin.phanquyen.index");
}

}
