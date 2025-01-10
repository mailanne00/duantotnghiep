<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiTheoDoi extends Model
{
    use HasFactory;

    protected $fillable = ['nguoi_theo_doi_id', 'nguoi_duoc_theo_doi_id'];

    public function nguoiTheoDoi()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_theo_doi_id');
    }

    public function nguoiDuocTheoDoi()
    {
        return $this->belongsTo(TaiKhoan::class, 'nguoi_duoc_theo_doi_id');
    }
}
