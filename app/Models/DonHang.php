<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';

    protected $fillable = [
        'ma_don_hang',
        'id_khach_hang',
        'ten_khach_hang',
        'email_khach_hang',
        'phone_khach_hang',
        'ten_ship',
        'phone_ship',
        'dia_chi_ship',
        'trang_thai_thanh_toan',
        'trang_thai_don_hang',
        'tong_tien',
    ];
}
