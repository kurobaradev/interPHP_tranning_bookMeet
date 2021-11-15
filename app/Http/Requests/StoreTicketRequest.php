<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date'=>'bail|required|',
            'timeSlot'=>'bail|required|',

        ];
    }

    public function messages()
    {
        return [
            'date.required'=>'Ngày không được để trống',
            'timeSlot.required'=>'Giờ không được để trống',
        ];
    }
}
