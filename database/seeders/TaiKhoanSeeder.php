<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taiKhoans = [
            [
                'ten' => 'Nguyễn Minh Trí',
                'ngay_sinh' => '1990-01-01',
                'biet_danh' => 'A',
                'gioi_tinh' => 'Nam',
                'email' => 'tri@gmail.com',
                'sdt' => '0123456789',
                'cccd' => '123456789012',
                'mat_khau' => Hash::make('1'), // Băm mật khẩu
                'so_du' => 1000000,
                'anh_dai_dien' => 'avatar',
                'bi_cam' => false,
                'phan_quyen_id' => 1, // Thay thế bằng ID thực tế trong bảng phan_quyen
            ],
            [
                'ten' => 'Trần Văn B',
                'ngay_sinh' => '1990-01-01',
                'biet_danh' => 'A',
                'gioi_tinh' => 'Nam',
                'email' => 'b@gmail.com',
                'sdt' => '012345678',
                'cccd' => '12345678901',
                'mat_khau' => Hash::make('2'), // Băm mật khẩu
                'so_du' => 1000000,
                'anh_dai_dien' => 'avatar',
                'bi_cam' => false,
                'phan_quyen_id' => 2, // Thay thế bằng ID thực tế trong bảng phan_quyen
            ],
            [
                'ten' => 'Trần Văn C',
                'ngay_sinh' => '1990-01-01',
                'biet_danh' => 'A',
                'gioi_tinh' => 'Nam',
                'email' => 'c@gmail.com',
                'sdt' => '012345679',
                'cccd' => '12345678902',
                'mat_khau' => Hash::make('3'), // Băm mật khẩu
                'so_du' => 1000000,
                'anh_dai_dien' => 'avatar',
                'bi_cam' => false,
                'phan_quyen_id' => 3, // Thay thế bằng ID thực tế trong bảng phan_quyen
            ],
        ];

        foreach ($taiKhoans as $key => $taiKhoan) {
            TaiKhoan::create($taiKhoan);
        }
    }
}