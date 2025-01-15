<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class YeuCauRutTien extends Model
{
    use HasFactory;

    protected $fillable=['tai_khoan_id', 'so_tien', 'trang_thai', 'ten_ngan_hang', 'so_tai_khoan', 'ma_xet_duyet', 'xet_duyet'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ma_xet_duyet = Str::uuid(); // Sinh mã UUID ngẫu nhiên
        });
    }


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
}
