<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ma_don_hang' => '',
            'id_khach_hang' => '',
            'email_khach_hang' => '',
            'ten_nguoi_mua' => '',
            'phone_nguoi_mua' => '',
            'ten_shipper' => '',
            'phone_shipper' => '',
            'dia_chi_shipper' => '',
            'trang_thai_thanh_toan' => '',
            'trang_thai_don_hang' => '',
            'tong_tien' => '',
        ];
    }
}
