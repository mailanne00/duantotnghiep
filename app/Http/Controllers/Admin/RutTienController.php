<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YeuCauRutTien;
use Illuminate\Http\Request;

class RutTienController extends Controller
{
    public function index()
    {
        $yeuCauRutTiens = YeuCauRutTien::with('nguoiRut')->where('xet_duyet', 1)->get(); 
        return view('admin.rut-tien.index', compact('yeuCauRutTiens'));
    }
}
