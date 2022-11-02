<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAccountController extends Controller
{
    public function index(){
        return view('client.page.user_profile');
    }

    public function uploadFile(Request $request){
        $user = Auth::guard('customer')->user();
        $path_save = 'public/'.(string)($user->id).'-'.$user->email;
        $path = $request->file('file')->storeAs(
            $path_save, $request->name
        );
        
    }
}
