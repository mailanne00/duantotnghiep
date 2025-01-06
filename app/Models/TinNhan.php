<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinNhan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tin_nhan',
        'nguoi_gui',
        'nguoi_nhan',
        'trang_thai',
        'phong_chat_id'
    ];

    public function phongChat()
    {
        return $this->belongsTo(PhongChat::class);
    }

    public function nguoiGui()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_gui');
    }

    public function nguoiNhan()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_nhan');
    }
}
