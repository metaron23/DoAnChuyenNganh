<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'bai_viets';

    protected $fillable = [
        'tieu_de',
        'noi_dung_ngan',
        'hinh_anh',
        'noi_dung_chi_tiet',
        'id_nguoi_dang',
        'ten_nguoi_dang',
        'id_danh_muc',
        'ten_danh_muc',
    ];
}
