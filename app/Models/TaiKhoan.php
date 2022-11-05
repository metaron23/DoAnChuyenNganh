<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TaiKhoan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "tai_khoans";

    protected $fillable=[
        'ho_va_ten',
        'nam_sinh',
        'gioi_tinh',
        'dia_chi',
        'so_dien_thoai',
        'email',
        'password',
        'anh_dai_dien',
        'loai_tai_khoan',
        'id_chi_nhanh',
        'tinh_trang',
        'kich_hoat',
        'hash',
        'hash_reset',
    ];
}
