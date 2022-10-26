<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    use HasFactory;

    protected $table = 'mon_ans';

    protected $fillable=[
        'ma_mon_an',
        'ten_mon_an',
        'slug_mon_an',
        'tinh_trang',
        'don_gia_ban',
        'don_gia_khuyen_mai',
        'hinh_anh',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'soluong',
        'id_danh_muc',
    ];
}
