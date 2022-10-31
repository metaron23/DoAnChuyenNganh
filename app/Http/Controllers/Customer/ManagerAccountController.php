<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ManagerAccountController extends Controller
{
    public function index(){
        return view('client.page.user_profile');
    }
}
