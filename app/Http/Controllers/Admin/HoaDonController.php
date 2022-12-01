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
    public function index()
    {
        $countHoaDon =DonHang::where('trang_thai_don_hang', 2)->count();
        $hoaDon = DonHang::where('trang_thai_don_hang', 2)->orderBy('created_at', 'DESC')
        ->paginate(4);
        foreach ($hoaDon as $key => $value) {
            $food = GioHang::where('id_don_hang', $value->id)
                    ->get();
            $value['food'] = $food;
        }
        $checkMenu = 5;
        return view('admin.pages.invoice.invoice', compact('checkMenu', 'hoaDon', 'countHoaDon'));
    }

    public function export($amount)
    {
        return (new DonHangExport($amount))->download('invoices_'.$amount.'.xlsx');
    }

    public function getData($id)
    {
        $hoaDon = DonHang::where('id', $id)->first();
        $food = GioHang::where('id_don_hang', $id)
                ->get();
        $hoaDon['food'] = $food;

        return response()->json([
            'hoaDon' => $hoaDon,
        ]);
    }
}
