<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToCao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nguoi_to_cao',
        'nguoi_bi_to_cao',
        'lich_su_thue_id',
        'anh_bang_chung',
        'ly_do',
        'trang_thai',
        'phong_chat_id',
        'created_at',
        'updated_at',
    ];



    const TRANGTHAITOCAO = [
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

    public function donThue()
    {
        return $this->belongsTo(LichSuThue::class, 'lich_su_thue_id', 'id');
    }

    public function phongChat()
    {
        return $this->belongsTo(PhongChat::class, 'phong_chat_id', 'id');
    }
}
