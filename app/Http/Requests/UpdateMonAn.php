<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMonAn extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'id'                    =>  'required|exists:mon_ans,id',
            'ma_mon_an'             =>  'required|unique:mon_ans,ma_mon_an,'.$this->id,
            'ten_mon_an'            =>  'required|min:5|unique:mon_ans,ten_mon_an,'.$this->id,
            'slug_mon_an'           =>  'required|min:5|unique:mon_ans,slug_mon_an,'.$this->id,
            'tinh_trang'            =>  'required|boolean',
            'don_gia_ban'           =>  'required|numeric|min:0',
            'don_gia_khuyen_mai'    =>  'numeric|numeric|max:'. $this->don_gia_ban,
            'hinh_anh'              =>  'required',
            'mo_ta_ngan'            =>  'required',
            'mo_ta_chi_tiet'        =>  'required',
            'id_danh_muc'           =>  'required|exists:danh_muc_mon_ans,id',
        ];
    }

    public function messages()
    {
        return [
            'required'      =>      ':attribute không được để trống!',
            'boolean'       =>      ':attribute không phải Yes/No!',
            'min'           =>      ':attribute quá nhỏ/ngắn!',
            'numeric'       =>      ':attribute không phải là số!',
            'max'           =>      ':attribute quá lớn/dài!',
            'exists'        =>      ':attribute không tồn tại!',
            'unique'        =>      ':attribute đã tồn tại trong hệ thống!',
        ];
    }

    public function attributes()
    {
        return [
        'ma_mon_an'             =>      'Mã món ăn',
        'ten_mon_an'            =>      'Tên món ăn',
        'slug_mon_an'           =>      'Slug món ăn',
        'tinh_trang'            =>      'Tình trạng',
        'don_gia_ban'           =>      'Đơn giá bán',
        'don_gia_khuyen_mai'    =>      'Đơn giá khuyến mãi',
        'hinh_anh'              =>      'Hình ảnh',
        'mo_ta_ngan'            =>      'Mô tả ngắn',
        'mo_ta_chi_tiet'        =>      'Mô tả chi tiết',
        'id_danh_muc'           =>      'ID danh mục',
        'id'                    =>      'ID món ăn'
        ];
    }
}
