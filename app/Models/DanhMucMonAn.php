<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucMonAn extends Model
{
    use HasFactory;
    protected $table = 'danh_muc_mon_ans';

    protected $fillable=[
        'ma_danh_muc',
        'ten_danh_muc',
        'slug_danh_muc',
        'tinh_trang_danh_muc',
    ];
}
