<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    public function nguoiThue() {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_thue_id');
    }
    public function nguoiDuocThue() {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_duoc_thue_id');
    }
    public function lichSuThue() {
        return $this->belongsTo(LichSuThue::class,'nguoi_thue_id');
    }

}
