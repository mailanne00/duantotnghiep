<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuNap extends Model
{
    use HasFactory;

    protected $fillable = [
        'tai_khoan_id',
        'so_tien',
        'trang_thai',
    ];
}
