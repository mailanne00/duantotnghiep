<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToCao extends Model
{
    use HasFactory;

    const TRANGTHAITOCAO = [
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

    public function getMauAttribute()
    {
        foreach (self::TRANGTHAITOCAO as $key => $tocao) {
            if ($this->trang_thai == $key) {
                return $tocao['color'];
            }
        }
    }

    public function getTrangThai2Attribute()
    {
        foreach (self::TRANGTHAITOCAO as $key => $tocao) {
            if ($this->trang_thai == $key) {
                return $tocao['status'];
            }
        }
    }
    public function nguoiToCao()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_to_cao', 'id');
    }

    public function nguoiBiToCao()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_bi_to_cao', 'id');
    }

    public function donThue() {
        return $this->belongsTo(LichSuThue::class, 'lich_su_thue_id', 'id');
    }
}
