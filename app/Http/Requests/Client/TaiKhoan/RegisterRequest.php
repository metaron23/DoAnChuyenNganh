<?php

namespace App\Http\Requests\Client\TaiKhoan;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'ho_va_ten'         =>  'required|max:100',
            'password'          =>  'required|min:6|max:30',
            're_password'       =>  'required|same:password',
            'so_dien_thoai'     =>  'required|phone|unique:tai_khoans,so_dien_thoai',
            'email'             =>  'required|email|unique:tai_khoans,email',
        ];
    }

    public function messages()
    {
        return [
            'same'              =>  ':attribute không trùng với password!',
            'required'          =>  ':attribute không được để trống!',
            'min'               =>  ':attribute quá ngắn',
            'max'               =>  ':attribute quá dài',
            'numeric'           =>  ':attribute phải là kiểu số',
            'phone'             =>  ':attribute không phải là số hoặc không đúng',
            'unique'            =>  ':attribute đã tồn tại trong hệ thống',
        ];
    }

    public function attributes()
    {
        return [
            'ho_va_ten'         =>  'Họ và tên',
            'password'          =>  'Mật khẩu',
            're_password'       =>  'Mật khẩu nhập lại',
            'so_dien_thoai'     =>  'Số Điện Thoại',
            'email'             =>  'Email',
        ];
    }
}
