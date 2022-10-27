<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\GioHang;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerOrderController extends Controller
{
    public function index()
    {
        return view('client.page.manager_order');
    }

    public function getData()
    {
        $user = Auth::guard('customer')->user();
        $donHang = DonHang::where('id_khach_hang', $user->id)
                        ->orderBy('created_at', 'DESC')
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

    public function delete($id)
    {
        $user = Auth::guard('customer')->user();

        $donHang = DonHang::where('id_khach_hang', $user->id)
                                ->where('id', $id)
                                ->first();
        $donHang->trang_thai_don_hang = 2;
        $donHang->save();

        return response()->json([
            'status' => true,
        ]);
    }
}
