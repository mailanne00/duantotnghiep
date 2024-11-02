<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danh_gias';

    protected $fillable = [
        'player_id',
        'so_sao',
        'nhan_xet',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
