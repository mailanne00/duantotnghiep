<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucTaiKhoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tai_khoan_id',
        'danh_muc_id'
    ];
    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class);
    }

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }
}
