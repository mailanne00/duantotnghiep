<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'tai_khoan_id',
        'da_doc'
    ];

    public function nguoiGui()
    {

        return $this->belongsTo(Taikhoan::class, 'nguoi_gui_id');
    }
    public function taiKhoan()
    {
        return $this->belongsTo(Taikhoan::class, 'tai_khoan_id');
    }
}
