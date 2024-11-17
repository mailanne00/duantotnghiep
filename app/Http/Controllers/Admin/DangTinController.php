<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DangTin;
use Illuminate\Http\Request;

class DangTinController extends Controller
{
    public function index()
    {
        $dangTins = DangTin::all();
        return view('admin.dang-tin.index', compact('dangTins'));
    }
}
