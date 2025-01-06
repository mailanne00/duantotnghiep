<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_phong_chat',
    ];


    public function tinNhans()
    {
        return $this->hasMany(TinNhan::class);
    }
}
