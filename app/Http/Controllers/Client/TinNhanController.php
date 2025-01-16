<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TinNhan;
use App\Events\NewMessage;
use App\Events\TinNhanMoi;

use App\Models\PhongChat;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TinNhanController extends Controller
{
    public function index()
    {
        // Lấy các phòng chat duy nhất
        $tinNhans = TinNhan::with(['nguoiGui', 'nguoiNhan'])
            ->distinct('phong_chat_id')
            ->get();

        return response()->json([
            'tin_nhans' => $tinNhans,
        ], 200); // HTTP status 200 for success
    }



    public function sendMessage(Request $request)
    {
        // Tạo tin nhắn mới
        $message = TinNhan::create([
            'tin_nhan' => $request->tin_nhan,
            'nguoi_gui' => $request->nguoi_gui,
            'nguoi_nhan' => $request->nguoi_nhan,
            'trang_thai' => 'chua_xem',
            'phong_chat_id' => $request->phong_chat_id,
        ]);

        // Lấy thông tin nguoi_gui và nguoi_nhan
        $nguoiGui = TaiKhoan::find($message->nguoi_gui);
        $nguoiNhan = TaiKhoan::find($message->nguoi_nhan);

        // Phát sóng sự kiện với thông tin tin nhắn và người gửi, người nhận
        broadcast(new NewMessage($message, $nguoiGui, $nguoiNhan));

        // Trả về JSON với thông tin tin nhắn và người gửi, người nhận
        return response()->json([
            'message' => $message,
            'nguoi_gui' => $nguoiGui,
            'nguoi_nhan' => $nguoiNhan,
        ]);
    }

    public function chiTiettinNhan($phongChatId)
    {
        $messages = TinNhan::with(['nguoiGui', 'nguoiNhan'])
            ->where('phong_chat_id', $phongChatId)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function markAsRead($phongChatId)
    {
        // Cập nhật trạng thái của tất cả tin nhắn trong phòng
        TinNhan::where('phong_chat_id', $phongChatId)
            ->where('trang_thai', 'chua_xem') // Chỉ cập nhật tin nhắn chưa xem
            ->update(['trang_thai' => 'da_xem']);

        return response()->json([
            'success' => true,
            'message' => 'All messages marked as read',
        ], 200);
    }
    public function taoChatMoi(Request $request)
    {
        // Kiểm tra xem người gửi và người nhận đã có phòng chat hay chưa
        $phongChat = PhongChat::whereHas('tinNhans', function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('nguoi_gui', $request->nguoi_gui)
                    ->where('nguoi_nhan', $request->nguoi_nhan);
            })->orWhere(function ($query) use ($request) {
                $query->where('nguoi_gui', $request->nguoi_nhan)
                    ->where('nguoi_nhan', $request->nguoi_gui);
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
            'nguoi_gui' => $request->nguoi_gui,
            'nguoi_nhan' => $request->nguoi_nhan,
            'trang_thai' => 'chua_xem',
            'phong_chat_id' => $phongChat->id,
        ]);

        event(new TinNhanMoi($tinNhan));

        // Lấy thông tin chi tiết của người gửi và người nhận
        $nguoiGui = $tinNhan->nguoiGui; // Quan hệ nguoiGui()
        $nguoiNhan = $tinNhan->nguoiNhan; // Quan hệ nguoiNhan()

        // Truyền thông tin vào response
        return response()->json([
            'success' => true,
            'message' => 'Tin nhắn đã được gửi!',
            'phong_chat_id' => $phongChat->id,
            'data' => $tinNhan,
            'nguoi_gui' => $nguoiGui,
            'nguoi_nhan' => $nguoiNhan,
        ]);
    }
}
