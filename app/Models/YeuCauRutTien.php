<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class YeuCauRutTien extends Model
{
    use HasFactory;

    protected $fillable=['tai_khoan_id', 'so_tien', 'trang_thai', 'ten_ngan_hang', 'so_tai_khoan', 'xet_duyet'];

    const TRANGTHAIRUTTIEN = [
        [
            'color' => 'primary',
            'status' => 'Đang xử lý',
        ],
        [
            'color' => 'success',
            'status' => 'Rút tiền thành công'
        ],
        [
            'color' => 'danger',
            'status' => 'Rút tiền không thành công'
        ]
    ];

    public function markAsProcessing()
    {
        $this->update(['trang_thai' => '1']);
    }

    public function markAsCancelled()
    {
        $this->update(['trang_thai' => '2']);
    }

    public function nguoiRut()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
}
