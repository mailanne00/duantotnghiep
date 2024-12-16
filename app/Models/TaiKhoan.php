<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['ten',
        'email',
        'password',
        'ngay_sinh',
        'dia_chi',
        'sdt',
        'gia_tien',
        'phan_quyen_id',
        'so_du',
        'bi_cam',
        'anh_dai_dien',
        'loi_nhuan',
        'biet_danh',
        'trang_thai'];

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

    public function getCountAttribute()
    {
        $count = NguoiTheoDoi::query()
            ->where('nguoi_duoc_theo_doi_id', $this->id)
            ->count();
        return $count;
    }

    public function getCountRentAttribute()
    {
        $count = LichSuThue::query()
            ->where('nguoi_duoc_thue', $this->id)
            ->count();
        return $count;
    }
    public function getCountDanhGiaAttribute()
    {
        $averageRating = DanhGia::query()
            ->where('nguoi_duoc_thue_id', $this->id)
            ->avg('danh_gia');
        return number_format($averageRating, 1);
    }

    public function getRaitingCountAttribute()
    {
        $raitingCounts = DanhGia::query()
            ->where('nguoi_duoc_thue_id', $this->id)
            ->select('danh_gia', DB::raw('count(*) as count'))
            ->groupBy('danh_gia')
            ->get();
        $ratingSummary = [
            '5_sao' => 0,
            '4_sao' => 0,
            '3_sao' => 0,
            '2_sao' => 0,
            '1_sao' => 0,
        ];
        foreach ($raitingCounts as $ratingCount) {
            $ratingSummary[$ratingCount->danh_gia . '_sao'] = $ratingCount->count;
        }

        return $ratingSummary;
    }

    public function getRentAttribute()
    {
        $rentCounts = LichSuThue::query()
            ->where('nguoi_duoc_thue', $this->id)
            ->select('trang_thai', DB::raw('count(*) as count'))
            ->groupBy('trang_thai')
            ->get();

        $rentStatus = [
            '0' => 0,
            '1' => 0,
            '2' => 0,
        ];

        foreach ($rentCounts as $rentCount) {
            switch ($rentCount->trang_thai) {
                case 0:
                    $rentStatus['0'] = $rentCount->count;
                    break;
                case 1:
                    $rentStatus['1'] = $rentCount->count;
                    break;
                case 2:
                    $rentStatus['2'] = $rentCount->count;
                    break;
            }
        }

        return $rentStatus;
    }


    public function getDaiGiaAttribute()
    {
        $total24h = LichSuThue::query()
            ->where('nguoi_thue', $this->id)
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->sum(DB::raw('gia_thue * gio_thue'));

        // Tổng giá trị trong 1 tuần
        $totalWeek = LichSuThue::query()
            ->where('nguoi_thue', $this->id)
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->sum(DB::raw('gia_thue * gio_thue'));

        // Tổng giá trị trong 1 tháng
        $totalMonth = LichSuThue::query()
            ->where('nguoi_thue', $this->id)
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->sum(DB::raw('gia_thue * gio_thue'));

        return [
            'id'=> $this->id,
            '24h' => $total24h,
            'week' => $totalWeek,
            'month' => $totalMonth,
        ];
    }

}
