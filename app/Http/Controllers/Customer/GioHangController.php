<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Http\Requests\Client\UpdateCartRequest;
use App\Models\GioHang;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class GioHangController extends Controller
{
    public function store($id_mon_an)
    {
        $customer = Auth::guard('customer')->user();
        $mon_an = MonAn::find($id_mon_an);
        if ($mon_an) {
            $chi_tiet_don_hang = GioHang::where('id_mon_an', $id_mon_an)
                            ->where('id_tai_khoan', $customer->id)
                            ->whereNull('id_don_hang')
                            ->first();
            if ($chi_tiet_don_hang) {
                $chi_tiet_don_hang->so_luong_mua++;
                $chi_tiet_don_hang->don_gia_mua += $mon_an->don_gia_khuyen_mai==null ? $mon_an->don_gia_ban : $mon_an->don_gia_khuyen_mai;
                $chi_tiet_don_hang->save();
            } else {
                GioHang::create([
                    'id_mon_an'     =>  $id_mon_an,
                    'id_tai_khoan'  =>  $customer->id,
                    'don_gia_mua'   =>  $mon_an->don_gia_khuyen_mai==null ? $mon_an->don_gia_ban : $mon_an->don_gia_khuyen_mai,
                    'ten_mon_an'    =>  $mon_an->ten_mon_an,
                    'hinh_anh'      =>  $mon_an->hinh_anh,
                ]);
            };

            $count = GioHang::where('id_tai_khoan', $customer->id)
                            ->whereNull('id_don_hang')
                            ->get()
                            ->count();
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Đã thêm vào giỏ hàng thành công!',
                'count'     => $count,
            ]);
        } else {
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Sản phẩm không tồn tại!'
            ]);
        }
    }

    public function index()
    {
        return view('client.page.cart');
    }

    public function dataCart()
    {
        $check = Auth::guard('customer')->check();
        if ($check) {
            $user = Auth::guard('customer')->user();
            $cart = GioHang::join('mon_ans', 'gio_hangs.id_mon_an', 'mon_ans.id')
                        ->select(
                            'gio_hangs.*',
                            'mon_ans.ten_mon_an',
                            'mon_ans.hinh_anh',
                            'mon_ans.don_gia_ban',
                            'mon_ans.don_gia_khuyen_mai'
                        )
                        ->where('id_tai_khoan', $user->id)
                        ->whereNull('id_don_hang')
                        ->get();
            return response()->json([
                'cart'  =>$cart,
                'status'=>true
            ]);
        } else {
            return response()->json(['status'=>false]);
        }
    }


    public function removeCart($id)
    {
        $customer = Auth::guard('customer')->user();

        if (GioHang::where('id', $id)
                ->where('id_tai_khoan', $customer->id)
                ->whereNull('id_don_hang')
                ->first()->delete()) {
            return response()->json(['status' => true]);
        };
    }

    public function updateCart(UpdateCartRequest $request)
    {
        $customer = Auth::guard('customer')->user();

        $chiTiet = GioHang::where('id', $request->id)
                        ->where('id_tai_khoan', $customer->id)
                        ->whereNull('id_don_hang')
                        ->first();
        $monAn = MonAn::where('id', $chiTiet->id_mon_an)->first();

        $chiTiet->so_luong_mua = $request->so_luong_mua;
        $chiTiet->don_gia_mua  = $chiTiet->so_luong_mua*($monAn->don_gia_khuyen_mai==null ? $monAn->don_gia_ban : $monAn->don_gia_khuyen_mai);

        if ($chiTiet->save()) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }



    public function totalCart(Request $request)
    {
        $check = Auth::guard('customer')->check();
        if ($check) {
            $customer = Auth::guard('customer')->user();
            $cart = GioHang::where('id_tai_khoan', $customer->id)
                                ->whereNull('id_don_hang')
                                ->get();
            $totalCart = 0;
            foreach ($cart as $key => $value) {
                $totalCart += $value->don_gia_mua;
            }
            return response()->json([
                'totalCart' => $totalCart,
            ]);
        }
    }

    public function countCart()
    {
        $check = Auth::guard('customer')->check();
        if ($check) {
            $customer = Auth::guard('customer')->user();
            $cart = GioHang::where('id_tai_khoan', $customer->id)
                                ->whereNull('id_don_hang')
                                ->get();
            $countCart = $cart->count();
            return response()->json([
                'countCart' => $countCart,
            ]);
        }
    }

    public function addCartFromDetail(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        $chi_tiet_don_hang = GioHang::where('id_mon_an', $request->id_mon_an)
                                            ->where('id_tai_khoan', $customer->id)
                                            ->whereNull('id_don_hang')
                                            ->first();
        $mon_an = MonAn::where('id', $request->id_mon_an)->first();
        $don_gia_mua = $mon_an->don_gia_khuyen_mai==null ? $mon_an->don_gia_ban : $mon_an->don_gia_khuyen_mai;
        if ($chi_tiet_don_hang) {
            $chi_tiet_don_hang->so_luong_mua += $request->so_luong_mua;
            $chi_tiet_don_hang->don_gia_mua += $don_gia_mua;
            $chi_tiet_don_hang->save();
        } else {
            GioHang::create([
                'id_mon_an'     =>  $request->id_mon_an,
                'id_tai_khoan'  =>  $customer->id,
                'don_gia_mua'   =>  $don_gia_mua,
                'ten_mon_an'    =>  $mon_an->ten_mon_an,
                'hinh_anh'      =>  $mon_an->hinh_anh,
                'so_luong_mua'  =>  $request->so_luong_mua,
            ]);
        };

        $count = GioHang::where('id_tai_khoan', $customer->id)
                        ->whereNull('id_don_hang')
                        ->get()
                        ->count();
        return response()->json([
            'status'    =>  true,
            'count'     => $count,
            'message'   =>  'Đã thêm vào giỏ hàng thành công!',
        ]);
    }
}
