<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopPlayerController extends Controller
{
    public function getTopFollowedPlayers()
{
    $players = Player::withCount('follows')
                ->orderBy('follows_count', 'desc')
                ->get();
    return view('admin.top-players.index', compact('players'));
}
public function getMostLikedPlayers()
{
    $players = Player::withCount(['posts as total_likes' => function ($query) {
                    $query->join('luot_thich_dang_tins', 'dang_tins.id', '=', 'luot_thich_dang_tins.dang_tin_id')
                          ->select(DB::raw("COUNT(luot_thich_dang_tins.id)"));
                }])
                ->orderBy('total_likes', 'desc')
                ->get();
    return view('admin.statistics.most_liked_players', compact('players'));
}
public function getMostHiredPlayers()
{
    $players = Player::withCount('hires')
                ->orderBy('hires_count', 'desc')
                ->get();
    return view('admin.statistics.most_hired_players', compact('players'));
}


}
