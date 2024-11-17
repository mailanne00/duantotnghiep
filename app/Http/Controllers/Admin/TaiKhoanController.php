<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
     public function index()
     {
         $taiKhoans = TaiKhoan::all();

         return view('admin.tai-khoan.index', compact('taiKhoans'));
     }

     public function create(){}
    public function store(Request $request){}
    public function show(int $id)
    {
        $taiKhoan = TaiKhoan::query()->findOrFail($id);
        return view('admin.tai-khoan.show', compact('taiKhoan'));
    }
}
