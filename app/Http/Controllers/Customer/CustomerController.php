<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use App\Http\Requests\Client\TaiKhoan\LoginRequest;
use App\Http\Requests\Client\TaiKhoan\RegisterRequest;
use App\Http\Requests\CreateTaiKhoan;
use App\Jobs\sendMailActiveJob;
use App\Jobs\sendMailChangePass;
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
            Auth::guard('customer')->logout();
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
                toastr()->warning('T??i kho???n ???? k??ch ho???t tr?????c ????!');
            } else {
                $customer->kich_hoat = 1;
                $customer->save();
                toastr()->success('Email: ' .$customer->email. ' ???? k??ch ho???t th??nh c??ng!');
            }
        } else {
            toastr()->error("M?? k??ch ho???t kh??ng t???n t???i");
        }

        return redirect('/home');
    }

    public function changePass(Request $request)
    {
        $hash_reset = Str::uuid()->toString();
        $email = $request->email;
        $user = TaiKhoan::where('email', $email)
                        ->where('loai_tai_khoan', 2)
                        ->first();
        $link = env('APP_URL') . '/confirmChangePass/' . $hash_reset;
        if ($user) {
            $user->hash_reset = $hash_reset;
            $user->save();
            sendMailChangePass::dispatch($user->ho_va_ten, $link, $email);
            return response()->json(['status'=>true]);
        } else {
            return response()->json(['status'=>false]);
        }
    }

    public function viewChangePass($hash_reset)
    {
        $user = TaiKhoan::where('hash_reset', $hash_reset)->first();
        if ($user) {
            return view('mail.changePassPage', compact('hash_reset'));
        } else {
            toastr()->warning('M?? ???? s??? d???ng!');
            return redirect('/login');
        }
    }

    public function newPass(Request $request)
    {
        $password = $request->password;
        $hash_reset = $request->hash_reset;
        $user = TaiKhoan::where('hash_reset', $hash_reset)->first();
        if ($user) {
            $hash_reset_new = Str::uuid()->toString();
            $user->password = bcrypt($password);
            $user->hash_reset = $hash_reset_new;
            $user->save();
            return response()->json(['status'=>true]);
        } else {
            return response()->json(['status'=>false]);
        }
    }
}
