<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\NguoiTheoDoi;
use Illuminate\Http\Request;

class TheoDoiController extends Controller
{
    public function store(Request $request)
    {
        NguoiTheoDoi::create([
            'nguoi_theo_doi_id' => auth()->id(),
            'nguoi_duoc_theo_doi_id' => $request->nguoi_duoc_theo_doi_id,
        ]);

        return back()->with('success', 'Đã theo dõi người dùng.');
    }

    public function destroy($id)
    {
        NguoiTheoDoi::where('nguoi_theo_doi_id', auth()->id())
            ->where('nguoi_duoc_theo_doi_id', $id)
            ->delete();

        return back()->with('success', 'Đã hủy theo dõi người dùng.');
    }
}
