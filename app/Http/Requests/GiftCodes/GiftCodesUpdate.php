<?php

namespace App\Http\Requests\GiftCodes;

use Illuminate\Foundation\Http\FormRequest;

class GiftCodesUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'  => 'required',
            'value'  => 'required',
            'qty'  => 'required',
            'create_day'  => 'required',
            'end_day'  => 'required|after_or_equal:create_day'
        ];
    }
    public function messages()
    {
        return [
            'code.required'  => 'Vui lòng nhập mã code',
            'code.unique'  => 'Mã này đã tồn tại',
            'value.required'  => 'Vui lòng nhập giá trị',
            'qty.required'  => 'Vui lòng nhập số lượng',
            'create_day.required'  => 'Vui lòng chọn ngày áp dụng',
            'end_day.required'  => 'Vui lòng chọn ngày kết thúc',
            'end_day.after_or_equal'  => 'Ngày kết thúc phải lớn hơn ngày bắt đầu'
        ];
    }
}
