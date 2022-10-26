<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaiKhoan as RequestsCreateTaiKhoan;
use App\Http\Requests\TaiKhoan\CreateTaiKhoan;
use App\Http\Requests\TaiKhoan\UpdateTaiKhoan;
use App\Http\Requests\UpdateTaiKhoan as RequestsUpdateTaiKhoan;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaiKhoanController extends Controller
{
    public function index()
    {
        return view('admin.pages.tai_khoan.index');
    }

    public function checkEmail(Request $request)
    {
        $taiKhoan = TaiKhoan::where('email', $request->email) -> first();

        if ($taiKhoan) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function checkSoDienThoai(Request $request)
    {
        $taiKhoan = TaiKhoan::where('so_dien_thoai', $request->so_dien_thoai) -> first();

        if ($taiKhoan) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function getData()
    {
        $taiKhoan = TaiKhoan::paginate(5);

        return response()->json([
            'data' => $taiKhoan
        ]);
    }

    public function updateStatus($id)
    {
        $user = Auth::guard('admin')->user();
        if ($user->id == $id && $user->tinh_trang) {
            return response()->json(['status' => false , 'message' => 'Bạn không thể tự khoá acc mình']);
        } else {
            $data = TaiKhoan::find($id);
            if ($data) {
                $data->tinh_trang = !$data->tinh_trang;
                $data->save();
                return response()->json(['status'=>true]);
            } else {
                return response()->json(['status'=>false]);
            }
        }
    }

    public function store(RequestsCreateTaiKhoan $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        TaiKhoan::create($data);
    }

    public function edit($id)
    {
        $data = TaiKhoan::find($id);

        if ($data) {
            return response()->json([
                'data' => $data,
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function update(RequestsUpdateTaiKhoan $request)
    {
        $user = Auth::guard('admin')->user();
        if ($user->id == $request->id && $request->tinh_trang == 0) {
            return response()->json(['status' => 0 , 'message' => 'Bạn không thể tự khoá acc mình']);
        }
        $taiKhoan = TaiKhoan::find($request->id);
        $taiKhoan->email  = $request->email;
        if ($request->password) {
            $taiKhoan->password  = bcrypt($request->password);
        }
        $taiKhoan->ho_va_ten  = $request->ho_va_ten;
        $taiKhoan->nam_sinh  = $request->nam_sinh;
        $taiKhoan->gioi_tinh  = $request->gioi_tinh;
        $taiKhoan->dia_chi  = $request->dia_chi;
        $taiKhoan->so_dien_thoai  = $request->so_dien_thoai;
        $taiKhoan->anh_dai_dien  = $request->anh_dai_dien;
        $taiKhoan->loai_tai_khoan  = $request->loai_tai_khoan;
        $taiKhoan->tinh_trang  = $request->tinh_trang;

        $taiKhoan->save();
        return response()->json(['status' => 1]);
    }

    public function viewLogin()
    {
        return view('admin.pages.auth.login');
    }

    public function actionLogin(Request $request)
    {
        $checkMail = Auth::guard('admin')->attempt([
            'email'     =>  $request->username,
            'password'  =>  $request->password,
        ]);

        if ($checkMail) {
            return response()->json(['status'=>true]);
        } else {
            return response()->json(['status'=>false]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->back();
    }
}
