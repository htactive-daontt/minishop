<?php

namespace App\Http\Requests\Slides;

use Illuminate\Foundation\Http\FormRequest;

class SlidesUpdate extends FormRequest
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
            'title' => 'required',
            'preview' => 'required',
            'thumbnail' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'preview.required' => 'Vui lòng nhập mô tả',
            'thumbnail.required' => 'Vui lòng chọn hình ảnh',
        ];
    }
}
