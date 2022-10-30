<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $checkMenu = 4;
        return view('admin.pages.don_hang.order', compact('checkMenu'));
    }

    public function changeToShipping($id)
    {
        $admin = Auth::guard('admin')->user();
        $order = DonHang::where('id', $id)->first();
        if ($order) {
            $order->trang_thai_don_hang = 1;
            $order->id_nguoi_xac_nhan = $admin->id;
            $order->ten_nguoi_xac_nhan = $admin->ho_va_ten;
            $order->save();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function changeToShipped($id)
    {
        $admin = Auth::guard('admin')->user();
        $order = DonHang::where('id', $id)->first();
        if ($order) {
            $order->trang_thai_don_hang = 2;
            $order->id_nguoi_xac_nhan = $admin->id;
            $order->ten_nguoi_xac_nhan = $admin->ho_va_ten;
            $order->save();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function changeToShippingAll()
    {
        $admin = Auth::guard('admin')->user();
        $order = DonHang::where('trang_thai_don_hang', 0)->get();
        if ($order->count() != 0) {
            foreach ($order as $key => $value) {
                $value->trang_thai_don_hang = 1;
                $value->id_nguoi_xac_nhan = $admin->id;
                $value->ten_nguoi_xac_nhan = $admin->ho_va_ten;
                $value->save();
            };
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function changeToShippedAll()
    {
        $admin = Auth::guard('admin')->user();
        $order = DonHang::where('trang_thai_don_hang', 1)->get();
        if ($order->count() != 0) {
            foreach ($order as $key => $value) {
                $value->trang_thai_don_hang = 2;
                $value->id_nguoi_xac_nhan = $admin->id;
                $value->ten_nguoi_xac_nhan = $admin->ho_va_ten;
                $value->save();
            };
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function getData()
    {
        $admin = Auth::guard('admin')->user();
        $donHang = DonHang::orderBy('created_at', 'DESC')
                        ->get();
        foreach ($donHang as $key => $value) {
            $food = GioHang::where('id_don_hang', $value->id)
                        ->get();
            $value['food'] = $food;
        }
        return response()->json([
            'donHang' => $donHang,
        ]);
    }
}
