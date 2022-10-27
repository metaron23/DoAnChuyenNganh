<?php

namespace App\Providers;

use App\Models\DanhMucMonAn;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            return preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10 && strlen($value) <=12;
        });

        // $danhMuc = DanhMucMonAn::where('tinh_trang_danh_muc',1)->orderBy('ten_danh_muc')->get();
        // view()->share('danhMuc', $danhMuc);
    }
}
