<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuNap extends Model
{
    use HasFactory;

    protected $fillable = [
        'tai_khoan_id',
        'so_tien',
        'trang_thai',
    ];

    public function nguoiNap()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
}
