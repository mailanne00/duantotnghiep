<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiTheoDoi;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{

    public function index()
    {
        $taiKhoans = TaiKhoan::all();

        return view('admin.tai-khoan.index', compact('taiKhoans'));
    }

    public function create()
    {
    }

    public function show(int $id)
    {
        $taiKhoan = TaiKhoan::query()->findOrFail($id);
        $a = [];
        $date = [1];
        $soNguoiTheoDois = NguoiTheoDoi::query()->where('nguoi_duoc_theo_doi_id', $id)->orderBy('created_at', 'asc')->get();
        foreach ($soNguoiTheoDois as $soNguoiTheoDoi) {
            $flag = false;
            $c = explode(' ', $soNguoiTheoDoi->created_at);
            $c = $c[0];
            $newDate = new \DateTime($c.' '. '24:59:59');
            foreach ($date as $day) {
                if ($day == $c) {
                    $flag = true;
                }
            }

            $date[] = $c;
            if ($flag===false) {
                $b = NguoiTheoDoi::query()->where('created_at', '<=', $newDate)->get()->count();
                $a[] = [
                    'date' => $c,
                    'follower'=>$b
                ];
            }
        }
        $a = json_encode($a);
        return view('admin.tai-khoan.show', compact('taiKhoan', 'a'));
    }
}
