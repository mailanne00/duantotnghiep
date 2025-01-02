<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $fillable = ['noi_dung', 'anh', 'tai_khoan_id'];

    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'blog_id');
    }
}
