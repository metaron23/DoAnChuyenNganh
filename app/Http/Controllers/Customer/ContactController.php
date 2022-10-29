<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $checkNav = 'contact';

        return view('client.page.contact', compact('checkNav'));
    }
}
