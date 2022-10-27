<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaiKhoan extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'id'                =>  'required|exists:tai_khoans,id',
            'ho_va_ten'         =>  'required|max:100',
            'nam_sinh'          =>  'required|date',
            'gioi_tinh'         =>  'required|boolean',
            'dia_chi'           =>  'required',
            'so_dien_thoai'     =>  'required|phone|unique:tai_khoans,so_dien_thoai,'.$this->id,
            'email'             =>  'required|email|unique:tai_khoans,email,'.$this->id,
            'password'          =>  'nullable|min:6|max:30',
            're_password'       =>  'nullable|same:password',
            'anh_dai_dien'      =>  '',
            'loai_tai_khoan'    =>  'required|numeric',
            'id_chi_nhanh'      =>  '',
            'tinh_trang'        =>  'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'required'          =>  ':attribute không được để trống!',
            'min'               =>  ':attribute quá ngắn',
            'boolean'           =>  ':attribute phải là kiểu boolean',
            'max'               =>  ':attribute quá dài',
            'numeric'           =>  ':attribute phải là kiểu số',
            'phone'             =>  ':attribute không phải là số hoặc không đúng',
            'same'              =>  ':attribute không trùng với password!',
        ];
    }

    public function attributes()
    {
        return [
            'ho_va_ten'         =>  'Họ và tên',
            'nam_sinh'          =>  'Năm Sinh',
            'gioi_tinh'         =>  'Giới Tính',
            'dia_chi'           =>  'Địa chỉ',
            'so_dien_thoai'     =>  'Số Điện Thoại',
            'email'             =>  'Email',
            'password'          =>  'Mật khẩu',
            're_password'       =>  'Mật khẩu nhập lại',
            'anh_dai_dien'      =>  'Ảnh Đại Diện',
            'loai_tai_khoan'    =>  'Loại Tài Khoản',
            'id_chi_nhanh'      =>  'ID Chi Nhánh',
            'tinh_trang'        =>  'Tình Trạng',
        ];
    }
}
