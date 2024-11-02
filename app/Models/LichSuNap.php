<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuNap extends Model
{
    use HasFactory;
    const TRANG_THAI = [
        [
            'color' => 'warning',
            'status' => 'Đang chờ xử lí'
        ],
        [
            'color' => 'danger',
            'status' => 'Đã bị huỷ'
        ],
        [
            'color' => 'success',
            'status' => 'Thành công'
        ],
    ];

    public function taiKhoan()
    {

        return $this->belongsTo(TaiKhoan::class);
    }

    public function getMauAttribute()
    {

        foreach (self::TRANG_THAI as $item) {
            if ($item['status'] == $this->trang_thai_thanh_toan) {
                return $item['color'];
            }
        }
    }

    public function phuong_thuc()
    {

        return $this->belongsTo(PhuongThucThanhToan::class, 'phuong_thuc_thanh_toan_id');
    }
}
