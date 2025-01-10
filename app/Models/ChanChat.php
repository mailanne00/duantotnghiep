<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChanChat extends Model
{
    use HasFactory;

    public function nguoiChan()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_chan');
    }

    public function nguoiBiChan()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_bi_chan');
    }
}
