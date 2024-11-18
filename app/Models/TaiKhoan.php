<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Model
{
    use HasFactory;

    const TRANGTHAITHUE = [
        [
            'color' => 'primary',
            'status'=> 'Đang được thuê',
        ],
        [
            'color' => 'success',
            'status'=>'Đang online'
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
}
