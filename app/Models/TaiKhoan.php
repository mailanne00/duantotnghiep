<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;

    protected $table = 'tai_khoans';

    protected $fillable = [
        'ten',
        'ngay_sinh',
        'biet_danh',
        'gioi_tinh',
        'email',
        'sdt',
        'cccd',
        'mat_khau',
        'so_du',
        'anh_dai_dien',
        'bi_cam',
        'phan_quyen_id',
    ];
    public function player()
    {
        return $this->hasOne(Player::class, 'tai_khoan_id');
    }

    public function phanQuyen()
    {
        return $this->belongsTo(PhanQuyen::class, 'phan_quyen_id');
    }

    public function lichSuThue()
    {
        return $this->hasMany(LichSuThuePlayer::class, 'tai_khoan_id');
    }

    public function theoDoiPlayer()
    {
        return $this->hasOne(TheoDoiPlayer::class, 'tai_khoan_id');
    }
}
