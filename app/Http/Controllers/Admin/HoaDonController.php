<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DonHangExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\DonHang;
use App\Models\GioHang;

class HoaDonController extends Controller
{
    public function index(){
        $checkMenu = 5;
        return view('admin.pages.hoa_don.hoa_don', compact('checkMenu'));
    }

    public function export()
    {
        return (new DonHangExport)->download('invoices.xlsx');
    }

    public function getData(){
        $admin = Auth::guard('admin')->user();
        $hoaDon = DonHang::where('trang_thai_don_hang',2)->orderBy('created_at', 'DESC')
                        ->get();
        foreach ($hoaDon as $key => $value) {
            $food = GioHang::where('id_don_hang', $value->id)
                        ->get();
            $value['food'] = $food;
        }
        return response()->json([
            'hoaDon' => $hoaDon,
        ]);
    }
}
