<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'bail|required|unique:rooms,name|max:255|min:5',
            'size'=>'bail|required|Numeric',
            'address'=>'bail|required',
            'feature_image_path'=>'bail|required',

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Phòng ban không được để trống',
            'name.unique'=>'Phòng ban đã tồn tại',
            'name.max'=>'Nhập quá kí tự cho phép (255 kí tự)',
            'name.min'=>'Kí tự tối thiểu là 5 kí tự',
            'size.required'=>'Số người không được để trống',
            'size.Numeric'=>'Chỉ được nhập số',
            'address.required'=>'Địa chỉ không được để trống',
            'feature_image_path.required'=>'Hình ảnh không được để trống',
        ];
    }
}
