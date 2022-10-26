<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaiKhoanMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $check  = Auth::guard('admin')->check();
        $admin = Auth::guard('admin')->user();
        if ($check && $admin->loai_tai_khoan == 0) {
            if ($admin->tinh_trang==0) {
                toastr()->error('Tài khoản của bạn đã bị khoá bởi hệ thống');
                return redirect('/admin/login');
            }
            return $next($request);
        } elseif ($check && $admin->loai_tai_khoan != 0) {
            toastr()->error('Tài khoản không tồn tại');
            return redirect('/admin/login');
        } else {
            return redirect('/admin/login');
        }
    }
}
