<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $checkNav = 'blog';

        return view('client.page.blog', compact('checkNav'));
    }
}
