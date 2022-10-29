<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function index(){
        return view('admin.pages.hoa_don.hoa_don');
    }
}
