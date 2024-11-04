<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $fillable = [
        "anh",
        "thong_tin",
        "gia_tien",
        "trang_thai_player",
        "tai_khoan_id",
        "so_tai_khoan",
    ];

    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }

    public function lichSuThue()
    {
        return $this->hasMany(LichSuThuePlayer::class, 'player_id');
    }

    public function theoDoiPlayer()
    {
        return $this->hasOne(TheoDoiPlayer::class, 'player_id');
    }
    public function dangTin()
    {
        return $this->hasMany(DangTin::class);
    }
    public function follows()
    {
        return $this->belongsToMany(Player::class, 'theo_doi_players', 'player_id', 'tai_khoan_id');
    }

}
