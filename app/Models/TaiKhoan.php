<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TaiKhoan extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['ten', 'email', 'password'];

    // Các phương thức cần thiết để sử dụng với Laravel Authentication
    public function getAuthIdentifierName()
    {
        return 'id'; // Hoặc 'email' nếu bạn xác thực qua email
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Trả về 'id' của người dùng
    }

    public function getAuthPassword()
    {
        return $this->password; // Trả về mật khẩu đã mã hóa
    }

    // Các phương thức liên quan đến Remember Me
    public function getRememberToken()
    {
        return $this->remember_token; // Trả về giá trị remember_token của user
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Gán giá trị remember_token vào model
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Tên của trường lưu remember_token trong database
    }



    const TRANGTHAITHUE = [
        [
            'color' => 'primary',
            'status' => 'Đang được thuê',
        ],
        [
            'color' => 'success',
            'status' => 'Đang online'
        ],
        [
            'color' => 'danger',
            'status' => 'Ngừng nhận yêu cầu'
        ]
    ];

    public function getTrangThai2Attribute()
    {
        foreach (self::TRANGTHAITHUE as $key => $thue) {
            if ($this->trang_thai == $key) {
                return $thue['status'];
            }
        }
    }

    public function getMauAttribute()
    {
        foreach (self::TRANGTHAITHUE as $key => $thue) {
            if ($this->trang_thai == $key) {
                return $thue['color'];
            }
        }
    }
}
