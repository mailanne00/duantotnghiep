<?php

namespace App\Http\Controllers\Client;

use App\Events\LichSuThueCreated;
use App\Events\TinNhanMoi;
use App\Http\Controllers\Controller;
use App\Http\Requests\LichSuThueRequest;
use App\Models\DanhGia;
use App\Models\LichSuThue;
use App\Models\TaiKhoan;
use App\Models\PhongChat;
use App\Models\ThongBao;
use App\Models\TinNhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class LichSuThueController extends Controller
{
    public function index()
    {
        $users = LichSuThue::where("nguoi_thue", auth()->user()->id)
            ->with('danhGia')
            ->orderByDesc("created_at")
            ->get()
            ->map(function ($user) {
                // Tính toán thời gian kết thúc
                $user->thoi_gian_ket_thuc = Carbon::parse($user->created_at)->addHours($user->gio_thue);
                return $user;
            });

        return view('client.lich-su-thue.index', compact('users'));
    }


    public function indexApiNguoiThue($id)
    {
        // Lấy thông tin lịch sử thuê
        $users = LichSuThue::where("nguoi_thue", $id)
            ->orderByDesc("created_at")
            ->get()
            ->map(function ($lichSu) {
                // Tính toán thời gian kết thúc
                $lichSu->thoi_gian_ket_thuc = Carbon::parse($lichSu->created_at)->addHours($lichSu->gio_thue);

                // Lấy thông tin người thuê (nguoi_thue) và người được thuê (nguoi_duoc_thue)
                $lichSu->nguoi_thue_info = TaiKhoan::find($lichSu->nguoi_thue); // Lấy thông tin người thuê
                $lichSu->nguoi_duoc_thue_info = TaiKhoan::find($lichSu->nguoi_duoc_thue); // Lấy thông tin người được thuê

                return $lichSu;
            });

        // Trả về dữ liệu dưới dạng JSON
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }


    public function themDonThue(LichSuThueRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('client.login');
        }

        $validateData = $request->validated();
        $timeNow = Carbon::now();
        $timePlus5Minutes = $timeNow->addMinutes(5);


        $phongChat = PhongChat::whereHas('tinNhans', function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('nguoi_gui', auth()->user()->id)
                    ->where('nguoi_nhan', $request->nguoi_nhan);
            })->orWhere(function ($query) use ($request) {
                $query->where('nguoi_gui', $request->nguoi_nhan)
                    ->where('nguoi_nhan', auth()->user()->id);
            });
        })->first();

        // Nếu chưa có phòng chat thì tạo mới
        if (!$phongChat) {
            $maPhongChat = Str::uuid()->toString();
            $phongChat = PhongChat::create([
                'ma_phong_chat' => $maPhongChat,
            ]);
        }

        $checkLichSuThue = LichSuThue::where('nguoi_thue', auth()->user()->id)
            ->where('nguoi_duoc_thue', $validateData['user_id'])
            ->where('trang_thai', '=', '0')
            ->where('expired', '<=', $timeNow)
            ->first();

        $userAuth = TaiKhoan::where('id', auth()->user()->id)->first();
        $user = TaiKhoan::where('id', $validateData['user_id'])->first();

        if ($user->trang_thai != 1) {
            return redirect()->back()->with('error', 'Người dùng không thể nhận yêu cầu thuê');
        }

        if ($userAuth->so_du < $request->tong_gia) {
            return redirect()->back()->with('error', 'Số dư không đủ');
        }

        if ($checkLichSuThue) {
            // dd($checkLichSuThue);
            // Cập nhật bản ghi hiện có
            $checkLichSuThue->loi_nhuan = $user->loi_nhuan;
            $checkLichSuThue->gio_thue += $validateData['gio_thue'];
            $checkLichSuThue->expired = $timePlus5Minutes;
            $checkLichSuThue->save();

            $taiKhoan = TaiKhoan::where('id', auth()->user()->id)->first();
            event(new LichSuThueCreated($checkLichSuThue));

            $tongGia = $taiKhoan->so_du - $request['tong_gia'];
            $taiKhoan->update(['so_du' => $tongGia]);


            // Tạo tin nhắn mới trong phòng chat
            $tinNhan = TinNhan::create([
                'tin_nhan' => $request->tin_nhan,
                'nguoi_gui' => auth()->user()->id,
                'nguoi_nhan' => $request->nguoi_nhan,
                'trang_thai' => 'chua_xem',
                'phong_chat_id' => $phongChat->id,
            ]);


            event(new TinNhanMoi($tinNhan));

            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã gửi yêu cầu duo cùng bạn',
                'tai_khoan_id' => $validateData['user_id']
            ]);


            return redirect()->back()->with('success', 'Thuê thành công.');
        } else {
            $lichSuThue = LichSuThue::create([
                'nguoi_thue' => auth()->user()->id,
                'nguoi_duoc_thue' => $validateData['user_id'],
                'gia_thue' => $validateData['gia_thue'],
                'gio_thue' => $validateData['gio_thue'],
                'loi_nhuan' => $user->loi_nhuan,
                'expired' => $timePlus5Minutes
            ]);

            event(new LichSuThueCreated($lichSuThue));
            $taiKhoan = TaiKhoan::where('id', auth()->user()->id)->first();
            $tongGia = $taiKhoan->so_du - $request['tong_gia'];
            $taiKhoan->update(['so_du' => $tongGia]);

            $phongChat = PhongChat::whereHas('tinNhans', function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('nguoi_gui', auth()->user()->id)
                        ->where('nguoi_nhan', $request->nguoi_nhan);
                })->orWhere(function ($query) use ($request) {
                    $query->where('nguoi_gui', $request->nguoi_nhan)
                        ->where('nguoi_nhan', auth()->user()->id);
                });
            })->first();

            // Nếu chưa có phòng chat thì tạo mới
            if (!$phongChat) {
                $maPhongChat = Str::uuid()->toString();
                $phongChat = PhongChat::create([
                    'ma_phong_chat' => $maPhongChat,
                ]);
            }



            // Tạo tin nhắn mới trong phòng chat
            $tinNhan = TinNhan::create([
                'tin_nhan' => $request->tin_nhan,
                'nguoi_gui' => auth()->user()->id,
                'nguoi_nhan' => $request->nguoi_nhan,
                'trang_thai' => 'chua_xem',
                'phong_chat_id' => $phongChat->id,
            ]);


            event(new TinNhanMoi($tinNhan));

            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã gửi yêu cầu duo cùng bạn',
                'tai_khoan_id' => $validateData['user_id']
            ]);
        }


        return redirect()->back()->with('success', 'Thuê thành công.');
    }

    public function lichSuDuocThue()
    {
        $tai_khoan = TaiKhoan::where('id', auth()->user()->id)->first();
        $users = LichSuThue::where("nguoi_duoc_thue", auth()->user()->id)
            ->with('danhGia')
            ->orderByDesc("id")
            ->get()
            ->map(function ($user) {
                // Tính toán thời gian kết thúc
                $user->thoi_gian_ket_thuc = Carbon::parse($user->created_at)->addHours($user->gio_thue);
                $user->tong_tien_nhan = ($user->gio_thue * $user->gia_thue) * (100 - (int)$user->loi_nhuan) / 100;
                $user->tien_chiet_khau = ($user->gio_thue * $user->gia_thue) * (int)$user->loi_nhuan / 100;
                return $user;
            });

        return view('client.lich-su-thue.lich-su-duoc-thue', compact('users'));
    }


    public function indexApiNguoiDuocThue($id)
    {
        $users = LichSuThue::where("nguoi_duoc_thue", $id)
            ->orderByDesc("id")
            ->get()
            ->map(function ($user) {
                // Tính toán thời gian kết thúc
                $user->thoi_gian_ket_thuc = Carbon::parse($user->created_at)->addHours($user->gio_thue);
                $user->tong_tien_nhan = ($user->gio_thue * $user->gia_thue) * (100 - (int)$user->loi_nhuan) / 100;
                $user->nguoi_thue_info = TaiKhoan::find($user->nguoi_thue); // Lấy thông tin người thuê
                $user->nguoi_duoc_thue_info = TaiKhoan::find($user->nguoi_duoc_thue); // Lấy thông tin người được thuê
                return $user;
            });

        // Trả về dữ liệu dưới dạng JSON
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function suaTrangThaiDonThue($id)
    {
        $trangThais = LichSuThue::where("nguoi_duoc_thue", auth()->user()->id)
            ->get();

        return view('client.lich-su-thue.lich-su-duoc-thue', compact('users'));
    }

    public function huyDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id);

        if ($user->trang_thai == 0) {
            $user->markAsCancelled();

            $taiKhoan = auth()->user();
            $taiKhoan->so_du += $user->gio_thue * $user->gia_thue;
            $taiKhoan->save();

            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã huỷ yêu cầu duo',
                'tai_khoan_id' => $user->nguoiDuocThue->id
            ]);

            return redirect()->back()->with('success', 'Huỷ đơn thuê thành công.');
        }

        return redirect()->back()->with('error', 'Xảy ra lỗi khi thao tác');
    }

    public function tuChoiDonThue(Request $request, $id)
    {
        $lichSuThue = LichSuThue::find($id);

        if ($lichSuThue->trang_thai == 0) {
            $lichSuThue->markAsCancelled();

            $taiKhoan = TaiKhoan::where('id', $request->tai_khoan_id)->first();

            $taiKhoan->so_du += $lichSuThue->gio_thue * $lichSuThue->gia_thue;
            $taiKhoan->save();

            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã từ chối yêu cầu duo',
                'tai_khoan_id' => $lichSuThue->nguoiThue->id
            ]);

            return redirect()->back()->with('success', 'Từ chối thuê thành công.');
        }

        return redirect()->back()->with('error', 'Xảy ra lỗi khi thao tác');
    }

    public function nhanDonThue(Request $request, $id)
    {
        $user = LichSuThue::find($id);

        if ($user->trang_thai == 0) {
            $user->markAsProcessing();
            LichSuThue::where('nguoi_duoc_thue', auth()->user()->id)
                ->where('trang_thai', operator: '0')
                ->update([
                    'trang_thai' => 2
                ]);
            $user->update([
                'expired' => Carbon::parse($user->updated_at)->addHour($user->gio_thue)
            ]);

            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã nhận yêu cầu duo',
                'tai_khoan_id' => $user->nguoiThue->id
            ]);

            TaiKhoan::find(Auth::id())->update(
                [
                    'trang_thai' => 0
                ]
            );

            return redirect()->back()->with('success', 'Nhận đơn thuê thành công.');
        }

        return redirect()->back()->with('error', 'Xảy ra lỗi khi thao tác');
    }

    public function ketThucDonThue(Request $request, $id)
    {
        $lichSuThue = LichSuThue::find($id);

        if ($lichSuThue->trang_thai == 3) {
            $lichSuThue->markAsEnd();

            $user = TaiKhoan::where('id', $request->user_id)->first();
            $user->trang_thai = 1;
            $user->so_du += ($lichSuThue->gio_thue * $lichSuThue->gia_thue) * (100 - (int)$lichSuThue->loi_nhuan) / 100;
            $user->save();

            ThongBao::create([
                'nguoi_gui_id' => auth()->user()->id,
                'noi_dung' => 'đã kết thúc đơn thuê',
                'tai_khoan_id' => $lichSuThue->nguoiDuocThue->id
            ]);

            return redirect()->back()->with('success', 'Kết thúc đơn thuê thành công.');
        }

        return redirect()->back()->with('error', 'Xảy ra lỗi khi thao tác');
    }

    public function danhGia(Request $request, $id)
    {
        $lichSuThue = LichSuThue::find($id);
        $user = TaiKhoan::find(id: $request->user_id); // người được thuê

        if ($lichSuThue->trang_thai == 1) {
            $danhGia = DanhGia::create([
                'nguoi_thue_id' => auth()->user()->id,
                'nguoi_duoc_thue_id' => $request->user_id,
                'noi_dung' => $request->noi_dung,
                'danh_gia' => $request->danh_gia,
                'lich_su_thue_id' => $id
            ]);
            return redirect()->back()->with('success', 'Đánh giá đơn thuê thành công.');
        }

        return redirect()->back()->with('error', 'Xảy ra lỗi khi thao tác');
    }
}
