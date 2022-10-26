<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDanhMucMonAn as RequestsCreateDanhMucMonAn;
use App\Http\Requests\DanhMucMonAn\CreateDanhMucMonAn;
use App\Http\Requests\DanhMucMonAn\UpdateDanhMucMonAn;
use App\Http\Requests\UpdateDanhMucMonAn as RequestsUpdateDanhMucMonAn;
use App\Models\DanhMucMonAn;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class DanhMucMonAnController extends Controller
{
    public function index()
    {
        return view('admin.pages.danh_muc_mon_an.index');
    }
    public function getData()
    {
        $danhMuc = DanhMucMonAn::all();
        return response()->json([
            'data' => $danhMuc,
        ]);
    }
    public function create()
    {
        $danhMuc = DanhMucMonAn::all();

        return response()->json([
            'data' => $danhMuc,
        ]);
    }
    public function updateStatus($id)
    {
        $danhMuc = DanhMucMonAn::find($id);
        if ($danhMuc) {
            $danhMuc->tinh_trang_danh_muc = !$danhMuc->tinh_trang_danh_muc;
            $danhMuc->save();
            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }
    public function store(RequestsCreateDanhMucMonAn $request)
    {
        $data = $request->all();
        DanhMucMonAn::create($data);

        return response()->json([
            'status' => true,
        ]);
    }

    public function edit($id)
    {
        $danhMuc = DanhMucMonAn::find($id);
        if ($danhMuc) {
            return response()->json([
                'status'=>true,
                'data'=>$danhMuc,
            ]);
        } else {
            return response()->json([
                'status'=>false,
            ]);
        }
    }

    public function update(RequestsUpdateDanhMucMonAn $request)
    {
        $danhMuc = DanhMucMonAn::find($request->id);

        $danhMuc->ma_danh_muc           = $request->ma_danh_muc;
        $danhMuc->ten_danh_muc          = $request->ten_danh_muc;
        $danhMuc->slug_danh_muc         = $request->slug_danh_muc;
        $danhMuc->tinh_trang_danh_muc   = $request->tinh_trang_danh_muc;

        $danhMuc->save();
    }

    public function destroy($id)
    {
        $danhMuc = DanhMucMonAn::find($id);
        if ($danhMuc) {
            $danhMuc->delete();
            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }
}
