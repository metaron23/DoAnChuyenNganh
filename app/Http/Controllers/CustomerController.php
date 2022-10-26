<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\TaiKhoan\LoginRequest;
use App\Http\Requests\Client\TaiKhoan\RegisterRequest;
use App\Http\Requests\CreateTaiKhoan;
use App\Jobs\sendMailActiveJob;
use App\Mail\ActiveCustomerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function viewLogin()
    {
        $user = Auth::guard('customer')->check();
        if ($user) {
            return redirect('/home');
        } else {
            $checkLogin = 1;
            return view('client.page.login', compact('checkLogin'));
        }
    }

    public function viewRegister()
    {
        $user = Auth::guard('customer')->check();
        if ($user) {
            return redirect('/home');
        } else {
            $checkLogin = 0;

            return view('client.page.login', compact('checkLogin'));
        }
    }

    public function actionLogin(LoginRequest $request)
    {
        $request['email']   =   $request->user_name;
        unset($request['user_name']);

        $data       =   $request->all();
        $check      =   Auth::guard('customer')->attempt($data);
        $user = Auth::guard('customer')->user();
        if ($check && $user->loai_tai_khoan==2) {
            if ($user->tinh_trang == 0) {
                Auth::guard('customer')->logout();
                return response()->json(['status'=>3]);
            } else {
                if ($user->kich_hoat == 1) {
                    return response()->json(['status'=>1]);
                } else {
                    Auth::guard('customer')->logout();
                    return response()->json(['status'=>2]);
                }
            }
        } else {
            return response()->json(['status'=>0]);
        }
    }

    public function actionRegister(RegisterRequest $request)
    {
        $hash = Str::uuid()->toString();
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['loai_tai_khoan'] = "2";
        $data['hash'] = $hash;
        $link = env('APP_URL') . '/kich-hoat/' . $hash;
        if (TaiKhoan::create($data)) {
            sendMailActiveJob::dispatch($request->ho_va_ten, $link, $request->email);
            return response()->json(['status'=>true]);
        }
    }

    public function active($hash)
    {
        $customer = TaiKhoan::where('hash', $hash)->first();
        if ($customer) {
            if ($customer->kich_hoat == 1) {
                toastr()->warning('Tài khoản đã kích hoạt trước đó!');
            } else {
                $customer->kich_hoat = 1;
                $customer->save();
                toastr()->success('Email: ' .$customer->email. ' đã kích hoạt thành công!');
            }
        } else {
            toastr()->error("Mã kích hoạt không tồn tại");
        }

        return redirect('/home');
    }
}
