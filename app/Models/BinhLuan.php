<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    public function taiKhoan() {
        return $this->belongsTo(TaiKhoan::class);
    }
    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}
