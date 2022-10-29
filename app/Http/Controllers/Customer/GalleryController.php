<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $checkNav = 'gallery';

        return view('client.page.gallery', compact('checkNav'));
    }
}
