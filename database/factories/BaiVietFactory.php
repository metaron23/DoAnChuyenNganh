<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * \@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BaiViet>
 */
class BaiVietFactory extends Factory
{
    public function definition()
    {
        return [
            'tieu_de'           => fake()->name,
            'noi_dung_ngan'     => fake()->text,
            'hinh_anh'          => fake()->imageUrl($width = 200,$height = 300,'',true,'Faker'),
            'noi_dung_chi_tiet' => fake()->text,
            'id_nguoi_dang'     => '2',
            'ten_nguoi_dang'    => 'Thanh Hùng',
            'id_danh_muc'       => '6',
            'ten_danh_muc'      => 'Món Ăn Sáng',
        ];
    }
}
