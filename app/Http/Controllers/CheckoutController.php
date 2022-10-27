<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\DonHang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('client.page.checkout');
    }

    public function getData()
    {
        $user = Auth::guard('customer')->user();
        $data = GioHang::where('id_tai_khoan', $user->id)
                                ->whereNull('id_don_hang')
                                ->get();

        $totalCart = 0;
        foreach ($data as $key => $value) {
            $totalCart += $value->don_gia_mua;
        }

        return response() -> json([
            'user'      =>  $user,
            'listCart'  =>  $data,
            'totalCart' =>  $totalCart,
        ]);
    }

    public function store(Request $request)
    {
        // DB::beginTransaction();
        // try {
        $user = Auth::guard('customer')->user();
        $cart = GioHang::where('id_tai_khoan', $user->id)
                                        ->whereNull('id_don_hang')
                                        ->get();
        if ($cart == null) {
            toastr()->success('Vui lòng thêm món ăn vào giỏ hàng!');
        } else {
            $bill = DonHang::create([
                'id_khach_hang'         => $user->id,
                'ten_khach_hang'        => $user->ho_va_ten,
                'email_khach_hang'      => $user->email,
                'phone_khach_hang'      => $user->so_dien_thoai,
                'ten_ship'              => $request->ten_ship,
                'phone_ship'            => $request->phone_ship,
                'dia_chi_ship'          => $request->dia_chi_ship,
                'trang_thai_don_hang'   => 0,
                'trang_thai_thanh_toan' => $request->trang_thai_thanh_toan,
                'tong_tien'             => 0,
                'ma_don_hang'           => '',
            ]);

            $totalCart = 0;
            foreach ($cart as $key => $value) {
                $totalCart += $value->don_gia_mua;
                $value->id_don_hang = $bill->id;
                $value->save();
            };

            $bill -> tong_tien    = $totalCart;
            $bill -> ma_don_hang  = "DH" . (230597 + $bill->id);
            $bill->save();
            // if($check){
            //     DB::commit();
            // }else{
            //     DB::rollBack();
            // }
            toastr()->success('Tạo đơn hàng thành công!');
        }
        // } catch(Exception $e) {
        //     DB::rollBack();
        // }
    }
}
