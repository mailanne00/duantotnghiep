<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class TopPlayerController extends Controller
{
    public function index()
{
    // Lấy 10 player được theo dõi nhiều nhất và được thuê nhiều nhất
    $players = Player::withCount(['followers', 'hireLogs'])
        ->orderBy('followers_count', 'desc') // Sắp xếp theo số người theo dõi
        ->take(10) // Lấy 10 player được theo dõi nhiều nhất
        ->get();

    // Sắp xếp lại để lấy player được thuê nhiều nhất từ danh sách đã lấy
    $mostHiredPlayers = $players->sortByDesc('hire_logs_count')->take(10);
    
    return view('admin.top-players.index', compact('players', 'mostHiredPlayers'));
}


}
