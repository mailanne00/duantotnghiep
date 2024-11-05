<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HireLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'player_id',
        'tai_khoan_id',
        'hired_at',
    ];

    /**
     * Quan hệ với model Player.
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * Quan hệ với model TaiKhoan.
     */
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class);
    }
}
