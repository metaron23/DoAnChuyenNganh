<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonAn as RequestsCreateMonAn;
use App\Http\Requests\MonAn\CreateMonAn;
use App\Http\Requests\MonAn\UpdateMonAn;
use App\Http\Requests\UpdateMonAn as RequestsUpdateMonAn;
use App\Models\MonAn;
use Illuminate\Http\Request;

class MonAnController extends Controller
{
    public function index()
    {
        return view('admin.pages.mon_an.index');
    }

    public function getData()
    {
        $monAn = MonAn::join('danh_muc_mon_ans', 'mon_ans.id_danh_muc', 'danh_muc_mon_ans.id')
                        ->select('mon_ans.*', 'danh_muc_mon_ans.ten_danh_muc')
                        ->paginate(5);
        return response()->json([
            'data' => $monAn
        ]);
    }

    public function store(RequestsCreateMonAn $request)
    {
        $data = $request->all();
        MonAn::create($data);
    }

    public function checkMaMonAn(Request $request)
    {
        $monAn = MonAn::where('ma_mon_an', $request->ma_mon_an) -> first();

        if ($monAn) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function checkTenMonAn(Request $request)
    {
        $monAn = MonAn::where('ten_mon_an', $request->ten_mon_an) -> first();

        if ($monAn) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function checkSlugMonAn(Request $request)
    {
        $monAn = MonAn::where('slug_mon_an', $request->slug_mon_an) -> first();

        if ($monAn) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }

    public function updateStatus($id)
    {
        $data = MonAn::find($id);
        if ($data) {
            $data->tinh_trang = !$data->tinh_trang;
            $data->save();
            return response()->json(['status'=>true]);
        } else {
            return response()->json(['status'=>false]);
        }
    }

    public function edit($id)
    {
        $data = MonAn::find($id);

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

    public function update(RequestsUpdateMonAn $request)
    {
        $monAn = MonAn::find($request->id);
        $monAn->ma_mon_an = $request-> ma_mon_an;
        $monAn->ten_mon_an = $request-> ten_mon_an;
        $monAn->slug_mon_an = $request-> slug_mon_an;
        $monAn->tinh_trang = $request-> tinh_trang;
        $monAn->don_gia_ban = $request-> don_gia_ban;
        $monAn->don_gia_khuyen_mai = $request-> don_gia_khuyen_mai;
        $monAn->hinh_anh = $request-> hinh_anh;
        $monAn->mo_ta_ngan = $request-> mo_ta_ngan;
        $monAn->mo_ta_chi_tiet = $request-> mo_ta_chi_tiet;
        $monAn->id_danh_muc = $request-> id_danh_muc;

        $monAn->save();
    }
    public function destroy($id)
    {
        $payLoad = MonAn::find($id);
        if ($payLoad) {
            $payLoad->delete();
            return response()->json(['status'=>true]);
        } else {
            return response()->json(['status'=>false]);
        }
    }
}
