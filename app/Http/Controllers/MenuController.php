<?php

namespace App\Http\Controllers;

use App\Models\DanhMucMonAn;
use App\Models\MonAn;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $checkNav = 'menu';

        return view('client.page.menu', compact('checkNav'));
    }

    public function getCategory()
    {
        $category = DanhMucMonAn::all()->toArray();
        return response()->json([
            'category' => $category,
        ]);
    }

    public function getFood($id)
    {
        if ($id == 0) {
            $listFood = MonAn::paginate(5);
        } else {
            $listFood = MonAn::where('id_danh_muc', $id)->paginate(5);
        }
        return response()->json([
            'listFood' => $listFood,
        ]);
    }

    public function getDetailFood($id)
    {
        $detailFood = MonAn::join('danh_muc_mon_ans', 'mon_ans.id_danh_muc', 'danh_muc_mon_ans.id')
                        ->select('danh_muc_mon_ans.ten_danh_muc as ten_danh_muc', 'mon_ans.*')
                        ->where('mon_ans.id', $id)->first();
        if ($detailFood==null) {
            return redirect('/home');
        } else {
            return view('client.page.detail_product', compact('detailFood'));
        }
    }

    public function searchFood($key)
    {
        $food = MonAn::where('slug_mon_an', 'like', '%'.$key.'%')
                    ->orWhere('ten_mon_an', 'like', '%'.$key.'%')
                    ->get();
        return response()->json(['foodSearch' => $food]);
    }
}
