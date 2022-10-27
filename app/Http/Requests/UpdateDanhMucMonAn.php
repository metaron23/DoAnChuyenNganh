<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDanhMucMonAn extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:danh_muc_mon_ans,id',
            'ma_danh_muc' => 'required|min:3|unique:danh_muc_mon_ans,ma_danh_muc,'.$this->id,
            'ten_danh_muc' => 'required|min:5|unique:danh_muc_mon_ans,ten_danh_muc,'.$this->id,
            'slug_danh_muc' => 'required|min:5|unique:danh_muc_mon_ans,slug_danh_muc,'.$this->id,
            'tinh_trang_danh_muc' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'id.required'=>"Danh mục không thể để trống",
            'id.exists'=>"Danh mục không tồn tại trong hệ thống",
            'ma_danh_muc.required'=>"Mã danh mục không thể để trống",
            'ma_danh_muc.min'=>"Mã danh mục phải hơn 3 kí tự",
            'ma_danh_muc.unique'=>"Mã danh mục đã tồn tại trong hệ thống",
            'ten_danh_muc.required'=>"Tên danh mục không thể để trống",
            'ten_danh_muc.min'=>"Tên danh mục phải hơn 5 kí tự",
            'ten_danh_muc.unique'=>"Tên danh mục đã tồn tại trong hệ thống",
            'slug_danh_muc.required'=>"Slug danh mục không thể để trống",
            'slug_danh_muc.min'=>"Slug danh mục phải hơn 5 kí tự",
            'slug_danh_muc.unique'=>"Sug danh mục đã tồn tại trong hệ thống",
            'tinh_trang_danh_muc.required'=>"Tình trạng danh mục không thể để trống",
            'tinh_trang_danh_muc.boolean'=>"Tình trạng danh mục phải là kiểu boolean",
        ];
    }
}
