<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'id' => 'required|exists:gio_hangs,id',
            'so_luong_mua'=>'required|numeric|min:1'
        ];
    }
}
