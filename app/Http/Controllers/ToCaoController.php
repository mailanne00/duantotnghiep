<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToCao;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Storage;

class ToCaoController extends Controller
{
    //
    public function index()
    {
        $complaints = ToCao::with(['user', 'player'])->get();
        return view('admin.to-caos.index', compact('complaints'));
    }

    public function create()
    {
        $players = TaiKhoan::where('phan_quyen_id', 3)->get();

        return view('admin.to-caos.add', compact('players'));
    }


    public function show(ToCao $complaint)
    {
        return view('admin.to-caos.show', compact('complaint'));
    }


    public function store(Request $request)
    {
        $fakeUserId = 3;


        $request->validate([
            'id_player' => 'required|exists:tai_khoans,id',
            'noi_dung_to_cao' => 'required|string|max:5000',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();


            $imagePath = $image->storeAs('public/images', $imageName);


            $imagePath = Storage::url($imagePath);
        }


        ToCao::create([
            'id_nguoi_dung' => $fakeUserId,
            'id_player' => $request->id_player,
            'id_tin_nhan' => $request->input('id_tin_nhan', 1),
            'tieu_de_to_cao' => $request->tieu_de_to_cao,
            'noi_dung_to_cao' => $request->noi_dung_to_cao,
            'image_path' => $imagePath,
            'trang_thai' => 'Chờ xử lí',
        ]);


        return redirect()->route('admin.tocao.index')->with('success', 'Đã gửi tố cáo thành công.');
    }

    public function updateStatus(ToCao $complaint, Request $request)
    {
        $request->validate([
            'trang_thai' => 'required|in:Chờ xử lí,Đã Duyệt,Hủy',
        ]);

        if ($complaint->trang_thai === 'Đã Duyệt' && $request->trang_thai !== 'Đã Duyệt') {
            return redirect()->route('admin.tocao.index')->with('error', 'Không thể cập nhật trạng thái từ "Đã Duyệt" sang trạng thái khác.');
        }

        $complaint->update([
            'trang_thai' => $request->trang_thai,
        ]);



        $user = TaiKhoan::find($complaint->id_player);
        if ($user) {
            switch ($request->trang_thai) {
                case 'Đã Duyệt':
                    $user->update(['bi_cam' => 1]);
                    break;
                case 'Chờ xử lí':
                case 'Hủy':
                    $user->update(['bi_cam' => 0]);
                    break;
            }
        }

        return redirect()->route('admin.tocao.index')->with('success', 'Trạng thái đơn tố cáo đã được cập nhật thành công.');
    }


    public function destroy(ToCao $complaint)
    {
        $complaint->delete();

        return redirect()->back()->with('success', 'Complaint deleted successfully.');
    }
}
