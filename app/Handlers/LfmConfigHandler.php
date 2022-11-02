<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Auth;

class LfmConfigHandler extends \UniSharp\LaravelFilemanager\Handlers\ConfigHandler
{
    public function userField()
    {
        if (Auth::guard('admin')->user()->id == null) {
            return Auth::guard('customer')->user()->id;
        }
        return Auth::guard('admin')->user()->id;
    }
}
