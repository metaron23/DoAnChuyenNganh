<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $check  = Auth::guard('customer')->check();
        $customer = Auth::guard('customer')->user();

        if ($check && $customer->loai_tai_khoan == 2) {
            if ($customer->tinh_trang==0) {
                toastr()->error('Tài khoản của bạn đã bị khoá bởi hệ thống');
                Auth::guard('customer')->logout();
                return redirect('/login');
            }
            return $next($request);
        } elseif ($check && $customer->loai_tai_khoan != 2) {
            toastr()->error('Tài khoản không tồn tại');
            return redirect('/login');
        } else {
            toastr()->error('Bạn phải đăng nhập để thực hiện chức năng này');
            return redirect('/login');
        }
    }
}
