<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuThue extends Model
{
    use HasFactory;

    protected $fillable = [
        'nguoi_thue',
        'nguoi_duoc_thue',
        'gia_thue',
        'gio_thue',
        'loi_nhuan',
        'trang_thai',
        'expired'
    ];

    public function markAsProcessing()
    {
        $this->update(['trang_thai' => '3']);
    }

    public function markAsCancelled()
    {
        $this->update(['trang_thai' => '2']);
    }

    public function markAsEnd()
    {
        $this->update(['trang_thai' => '1']);
    }

    const TRANGTHAITHUE = [
        [
            'color' => 'warning',
            'status' => 'Đang chờ xử lí',
        ],
        [
            'color' => 'success',
            'status' => 'Thành công'
        ],
        [
            'color' => 'danger',
            'status' => 'Bị huỷ'
        ],
        [
            'color' => 'primary',
            'status' => 'Đang thực hiện'
        ],
        [
            'color' => 'warning',
            'status' => 'Trạng thái đang tranh chấp'
        ],
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

    public function nguoiThue()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_thue', 'id');
    }

    public function nguoiDuocThue()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_duoc_thue', 'id');
    }

    public function danhGia()
    {
        return $this->hasMany(DanhGia::class, 'lich_su_thue_id');
    }
}
