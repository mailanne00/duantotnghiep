<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToCao extends Model
{
    use HasFactory;

    protected $table = 'to_caos';
    protected $fillable = [
        'id_nguoi_dung',
        'id_player',
        'id_tin_nhan',
        'tieu_de_to_cao',
        'noi_dung_to_cao',

    ];

    public function user()
    {
        return $this->belongsTo(TaiKhoan::class, 'id_nguoi_dung');
    }

    public function player()
    {
        return $this->belongsTo(TaiKhoan::class, 'id_player');
    }
}
