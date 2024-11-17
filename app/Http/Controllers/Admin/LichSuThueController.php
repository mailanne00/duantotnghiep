<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuThue;
use Illuminate\Http\Request;

class LichSuThueController extends Controller
{
    public function index()
    {
        $lichSuThues = LichSuThue::query()->get();

        return view('admin.lich-su-thue.index', compact('lichSuThues'));
    }
}
