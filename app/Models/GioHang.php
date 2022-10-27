<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'gio_hangs';

    protected $fillable = [
        'id_mon_an',
        'so_luong_mua',
        'id_don_hang',
        'id_tai_khoan',
        'ten_mon_an',
        'hinh_anh',
        'don_gia_mua',
    ];
}
