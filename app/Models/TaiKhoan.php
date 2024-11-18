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

    public function getCountAttribute()
    {
        $count = NguoiTheoDoi::query()
            ->where('nguoi_duoc_theo_doi_id', $this->id)
            ->count();
        return $count;
    }
    public function getCountDanhGiaAttribute()
    {
        $averageRating = DanhGia::query()
            ->where('nguoi_duoc_thue_id', $this->id)
            ->avg('danh_gia');

        return number_format($averageRating, 1);
    }
}
