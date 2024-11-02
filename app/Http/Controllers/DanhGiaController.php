<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use App\Models\Player;
use Illuminate\Http\Request;

class DanhGiaController extends Controller


{


    public function index(Request $request)
    {
        $query = $request->input('query');
        $starRating = $request->input('star_rating'); // Nhận số sao từ input
    
        $danhGias = DanhGia::with('player')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('player_id', 'LIKE', "%{$query}%");
            })
            ->when($starRating, function ($queryBuilder) use ($starRating) {
                return $queryBuilder->where('so_sao', $starRating); // Tìm kiếm theo số sao
            })
            ->get();
    
        return view('admin.danh-gias.index', compact('danhGias'));
    }
    

    public function store(Request $request, $playerId)
    {
        $request->validate([
            'so_sao' => 'required|integer|min:1|max:5',
            'nhan_xet' => 'nullable|string',
        ]);

        DanhGia::create([
            'player_id' => $playerId,
            'so_sao' => $request->so_sao,
            'nhan_xet' => $request->nhan_xet,
        ]);

        return response()->json(['success' => 'Đánh giá đã được lưu']);
    }

    public function getAverageRating($playerId)
    {
        $player = Player::with('danhGias')->find($playerId);

        // Kiểm tra xem player có tồn tại không
        if (!$player) {
            return response()->json(['error' => 'Người chơi không tồn tại.'], 404);
        }

        $averageRating = $player->danhGias()->avg('so_sao');
        $danhGias = $player->danhGias()->get();

        return response()->json([
            'averageRating' => $averageRating,
            'danhGias' => $danhGias,
        ]);
    }
}
