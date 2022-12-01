<?php

namespace Database\Factories;

use App\Models\MonAn;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MonAn>
 */
class MonAnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $number_name = fake()->numberBetween(1, 60);
        $don_gia_ban = fake()->numberBetween(50000, 200000);
        return [
            'ma_mon_an' => 'MA'. Str::random(10),
            'ten_mon_an' => 'Cua xé xào thơm' . $number_name,
            'slug_mon_an' => 'cua-xe-xao-thom' . $number_name,
            'tinh_trang' => 1,
            'don_gia_ban' => $don_gia_ban,
            'don_gia_khuyen_mai' => fake()->numberBetween(40000, $don_gia_ban),
            'hinh_anh' => '/photos/shares/MonAn/1.jpg',
            'mo_ta_ngan' => fake()->text(),
            'mo_ta_chi_tiet' => fake()->text(),
            'id_danh_muc' => fake()->numberBetween(6,10),
        ];
    }
}
