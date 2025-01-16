<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
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
        $request->validate([
            'so_tai_khoan' => 'required',
            'so_tien' => 'required|integer|min: 10000| max:50000000',
        ], [
            'so_tai_khoan.required' => 'Vui lòng nhập số tài khoản',
            'so_tien.required' => 'Vui lòng nhập số tiền cần rút',
            'so_tien.integer' => 'Vui lòng nhập đúng định dạng số tiền là số',
            'so_tien.min' => 'Số tiền rút phải lớn hơn 10.000 VNĐ',
            'so_tien.max' => 'Số tiền rút không được quá 50.000.000 VNĐ',
        ]);

        if (auth()->check()) {
            $taiKhoan = TaiKhoan::where('id', auth()->id())->first();

            if ($request->so_tien > $taiKhoan->so_du) {
                return redirect()->back()->with('error', 'Số tiền rút vượt quá số dư hiện tại.');
            }

            YeuCauRutTien::create([
                'so_tien' => $request->so_tien,
                'tai_khoan_id' => auth()->id(),
                'ten_ngan_hang' => $request->ten_ngan_hang,
                'so_tai_khoan' => $request->so_tai_khoan,
            ]);

            $taiKhoan->so_du = $taiKhoan->so_du - $request->so_tien;
            $taiKhoan->save();

            return redirect()->back()->with('success', 'Tạo yêu cầu rút tiền thành công.');
        } else {
            return redirect()->route('client.baiViet')->with(['error' => 'Rút tiền không thành công']);
        }
    }
}
