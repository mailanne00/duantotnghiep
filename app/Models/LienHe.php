<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;
    protected $fillable = ['tai_khoan_id', 'noi_dung', 'anh'];
    public function taiKhoan() {
        return $this->belongsTo(TaiKhoan::class);
    }
}
