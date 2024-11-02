<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $fillable = ['noi_dung', 'tai_khoan_id', 'player_id', 'binh_luan_id', 'danh_gia', 'trang_thai'];

    public function taikhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id', 'id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }

    public function binhLuan()
    {
        return $this->belongsTo(BinhLuan::class, 'binh_luan_id', 'id');
    }
}
