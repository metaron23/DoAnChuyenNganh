<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAccountController extends Controller
{
    public function index()
    {
        return view('client.page.user_profile');
    }

    public function updateImage(Request $request)
    {
        if ($request->toArray() != null) {
            $user = Auth::guard('customer')->user();
            $path_save = 'public/'.(string)($user->id).'-'.$user->email;
            Storage::deleteDirectory($path_save);
            $path = $request->file('file')->storeAs(
                $path_save,
                $request->name
            );
            $new_path = explode("/", $path);
            $new_path[0] = '/storage';
            $path = implode('/', $new_path);
            $user->anh_dai_dien = $path;
            $user->save();
        }
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::guard('customer')->user();
        $user->ho_va_ten = $request->ho_va_ten;
        $user->dia_chi = $request->dia_chi;
        $user->so_dien_thoai = $request->so_dien_thoai;
        $user->nam_sinh = $request->nam_sinh;
        $user->gioi_tinh = $request->gioi_tinh;
        $user->save();
        return response()->json(['status' => true]);
    }
}
