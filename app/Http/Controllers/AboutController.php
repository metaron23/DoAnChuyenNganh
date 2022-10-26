<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $checkNav = 'about';

        return view('client.page.about', compact('checkNav'));
    }
}
