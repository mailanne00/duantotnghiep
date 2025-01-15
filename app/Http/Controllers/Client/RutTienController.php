<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\YeuCauRutTien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RutTienController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.vietqr.io/v2/banks');
        $banks = $response->json();

        return view('client.rut-tien.index', compact('banks'));
    }

    public function create(Request $request)
    {
        $bankName = $request->query('bankName');
        return view('client.rut-tien.create', compact('bankName'));
    }

    public function store(Request $request)
    {
        if (auth()->check()) {

            YeuCauRutTien::create([
                'so_tien' => $request->so_tien,
                'tai_khoan_id' => auth()->id(),
                'ten_ngan_hang' => $request->ten_ngan_hang,
                'so_tai_khoan' => $request->so_tai_khoan,
            ]);

            return redirect()->back()->with('success', 'Tạo yêu cầu rút tiền thành công.');
        } else {
            return redirect()->route('client.baiViet')->with(['error' => 2]);
        }
    }
}
