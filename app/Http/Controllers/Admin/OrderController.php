<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $checkMenu = 4;
        return view('admin.pages.don_hang.order', compact('checkMenu'));
    }

    public function changeToShipping($id){
        $order = DonHang::where('id', $id)->first();
        if($order){
            $order->trang_thai_don_hang = 1;
            $order->save();
            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false]);
        }
    }

    public function changeToShipped($id){
        $order = DonHang::where('id', $id)->first();
        if($order){
            $order->trang_thai_don_hang = 2;
            $order->save();
            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false]);
        }
    }

    public function changeToShippingAll(){
        $order = DonHang::where('trang_thai_don_hang', 0)->get();
        if($order->count() != 0){
            foreach($order as $key => $value){
                $value->trang_thai_don_hang = 1;
                $value->save();
            };
            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false]);
        }
    }

    public function changeToShippedAll(){
        $order = DonHang::where('trang_thai_don_hang', 1)->get();
        if($order->count() != 0){
            foreach($order as $key => $value){
                $value->trang_thai_don_hang = 2;
                $value->save();
            };
            return response()->json(['status' => true]);
        }else{
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
