<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $checkNav = 'about';
        return view('client.page.about', compact('checkNav'));
    }
}
