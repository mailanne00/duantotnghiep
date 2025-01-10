<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danh_mucs';
    protected $fillable = ['ten', 'anh'];


    public function taiKhoans()
    {
        return $this->belongsToMany(TaiKhoan::class, 'danh_muc_tai_khoan', 'danh_muc_id', 'tai_khoan_id');
    }
}
