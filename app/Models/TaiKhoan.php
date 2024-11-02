<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Sử dụng lớp Authenticatable
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class TaiKhoan extends Authenticatable // Kế thừa từ Authenticatable
{

    use HasFactory, Notifiable; // Thêm Notifiable để sử dụng thông báo

    

    protected $table = 'tai_khoans';

    protected $fillable = [
        'ten',
        'ngay_sinh',
        'biet_danh',
        'gioi_tinh',
        'email',
        'sdt',
        'cccd',
        'mat_khau',
        'so_du',
        'anh_dai_dien',
        'bi_cam',
        'phan_quyen_id',
    ];


    protected $hidden = [
        'mat_khau', // Ẩn mật khẩu trong kết quả truy vấn
    ];


    public function player()
    {
        return $this->hasOne(Player::class, 'tai_khoan_id');
    }

    public function phanQuyen()
    {
        return $this->belongsTo(PhanQuyen::class, 'phan_quyen_id');
    }

    public function isBanned()
    {
        return !is_null($this->banned_at);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
    public function generateAccountId()
{
    $lastId = TaiKhoan::orderBy('id', 'desc')->first();
    $newId = $lastId ? $lastId->id + 1 : 1;

    return 'TK' . str_pad($newId, 5, '0', STR_PAD_LEFT);
}


    public function lichSuThue()
    {
        return $this->hasMany(LichSuThuePlayer::class, 'tai_khoan_id');
    }

    public function theoDoiPlayer()
    {
        return $this->hasOne(TheoDoiPlayer::class, 'tai_khoan_id');
    }

}
