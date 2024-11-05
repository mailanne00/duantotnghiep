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
    public function followers()
    {
        return $this->hasMany(Follower::class);
    }
    public function hireLogs()
    {
        return $this->hasMany(HireLog::class);
    }
    public function followersCount()
    {
        return $this->followers()->count();
    }

    // Phương thức để đếm số lần thuê
    public function hireLogsCount()
    {
        return $this->hireLogs()->count();
    }
    

}
