<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuThuePlayer extends Model
{
    use HasFactory;

    public $fillable = [
        "tai_khoan_id",
        "player_id",
        "gia_player",
        "gio_thue",
        "trang_thai_thue",
    ];

    public function taiKhoan()
    {
        return $this->hasOne(TaiKhoan::class, 'tai_khoan_id');
    }

    public function player()
    {
        return $this->hasOne(Player::class, 'player_id');
    }
}
