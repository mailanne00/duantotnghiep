<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheoDoiPlayer extends Model
{
    use HasFactory;
    public $fillable = [
        "tai_khoan_id",
        "player_id"
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
