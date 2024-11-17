<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;

    const TRANGTHAITHUE = [
        [
            'color' => 'primary',
            'status'=> 'Đang được thuê',
        ],
        [
            'color' => 'success',
            'status'=>'Đang online'
        ],
        [
            'color' => 'danger',
            'status' => 'Ngừng nhận yêu cầu'
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
}
