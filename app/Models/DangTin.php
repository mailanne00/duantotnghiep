<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangTin extends Model
{
    protected $fillable = [
        'tai_khoan_id',
        'video',
        'noi_dung',
    ];
    use HasFactory;

    public function taiKhoan() {
        return $this->belongsTo(TaiKhoan::class);
    }
    public function getCountAttribute()
    {
        $count = LuotThichDangTin::query()
            ->where('dang_tin_id', $this->id)
            ->get()
            ->count();
        return $count;
    }
}
