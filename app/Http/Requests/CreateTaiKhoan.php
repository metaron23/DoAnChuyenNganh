<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateTaiKhoan extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'ho_va_ten'         =>  'required|max:100',
            'nam_sinh'          =>  'required|date',
            'gioi_tinh'         =>  'required|boolean',
            'password'          =>  'required|min:6|max:30',
            're_password'       =>  'required|same:password',
            'dia_chi'           =>  'required',
            'so_dien_thoai'     =>  'required|phone|unique:tai_khoans,so_dien_thoai',
            'email'             =>  'required|email|unique:tai_khoans,email',
            'anh_dai_dien'      =>  '',
            'loai_tai_khoan'    =>  'required|numeric',
            'id_chi_nhanh'      =>  '',
            'tinh_trang'        =>  'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'same'              =>  ':attribute không trùng với password!',
            'required'          =>  ':attribute không được để trống!',
            'min'               =>  ':attribute quá ngắn',
            'boolean'           =>  ':attribute phải là kiểu boolean',
            'max'               =>  ':attribute quá dài',
            'numeric'           =>  ':attribute phải là kiểu số',
            'phone'             =>  ':attribute không phải là số hoặc không đúng'
        ];
    }

    public function attributes()
    {
        return [
            'ho_va_ten'         =>  'Họ và tên',
            'nam_sinh'          =>  'Năm Sinh',
            'gioi_tinh'         =>  'Giới Tính',
            'dia_chi'           =>  'Địa chỉ',
            'password'          =>  'Mật khẩu',
            're_password'       =>  'Mật khẩu nhập lại',
            'so_dien_thoai'     =>  'Số Điện Thoại',
            'email'             =>  'Email',
            'anh_dai_dien'      =>  'Ảnh Đại Diện',
            'loai_tai_khoan'    =>  'Loại Tài Khoản',
            'id_chi_nhanh'      =>  'ID Chi Nhánh',
            'tinh_trang'        =>  'Tình Trạng',
        ];
    }
}
