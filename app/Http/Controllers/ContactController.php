<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $checkNav = 'contact';

        return view('client.page.contact', compact('checkNav'));
    }
}
