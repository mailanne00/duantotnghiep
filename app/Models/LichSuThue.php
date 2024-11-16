<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuThue extends Model
{
    use HasFactory;
    const TRANGTHAITHUE = [
        [
            'color' => 'warning',
            'status'=> 'Đang chờ xử lí',
        ],
        [
            'color' => 'success',
            'status'=>'Thành công'
        ],
        [
            'color' => 'danger',
            'status' => 'Bị huỷ'
        ],
        [
            'color' => 'primary',
            'status'=> 'Đang thực hiện'
        ]
    ];

    public function getTrangThai2Attribute()
    {
        foreach (self::TRANGTHAITHUE as $key => $thue) {
            if ($this->trang_thai == $key) {
                return $thue['status'];
            }
        }
    }

    public function getMauAttribute()
    {
        foreach (self::TRANGTHAITHUE as $key => $thue) {
            if ($this->trang_thai == $key) {
                return $thue['color'];
            }
        }
    }

    public function nguoiThue() {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_thue', 'id');
    }

    public function nguoiDuocThue() {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_duoc_thue', 'id');
    }
}