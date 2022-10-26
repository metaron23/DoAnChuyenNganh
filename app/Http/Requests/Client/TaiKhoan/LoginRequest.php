<?php

namespace App\Http\Requests\Client\TaiKhoan;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'password'              =>  'required|min:6|max:30',
            'user_name'             =>  'required|email|exists:tai_khoans,email',
        ];
    }

    public function messages()
    {
        return [
            'exists'                =>  ':attribute không tồn tại',
            'required'              =>  ':attribute không được để trống!',
            'max'                   =>  ':attribute quá dài',
            'min'                   =>  ':attribute quá ngắn',
        ];
    }

    public function attributes()
    {
        return [
            'user_name'         =>  'Email',
            'password'          =>  'Mật khẩu',
        ];
    }
}
