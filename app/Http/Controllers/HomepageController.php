<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function viewHome()
    {
        $monAnMoi = MonAn::orderByDesc('id')->take(8)->get();
        $checkNav = 'home';
        return view('client.page.home', compact('monAnMoi', 'checkNav'));
    }

    public function actionLogout()
    {
        Auth::guard('customer')->logout();
        toastr()->success('Đăng xuất thành công');
        return redirect()->back();
    }

    public function countCart(){
        $check = Auth::guard('customer')->check();
        $user = Auth::guard('customer')->user();
        $count = 0;
        if($check){
            $count += GioHang::where('id_tai_khoan', $user->id)
                                    ->whereNull('id_don_hang')
                                    ->get()
                                    ->count();
        }
        return response()->json(['countCart' => $count]);
    }
}
