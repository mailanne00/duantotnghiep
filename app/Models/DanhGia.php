<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $fillable = ['nguoi_thue_id', 'nguoi_duoc_thue_id', 'danh_gia', 'noi_dung', 'lich_su_thue_id'];

    public function nguoiThue() {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_thue_id');
    }
    public function nguoiDuocThue() {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_duoc_thue_id');
    }
    public function lichSuThue() {
        return $this->belongsTo(LichSuThue::class,'lich_su_thue_id');
    }

}
